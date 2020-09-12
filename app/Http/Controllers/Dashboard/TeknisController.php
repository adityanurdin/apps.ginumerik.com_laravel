<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\Models\KartuAlat;
use App\SerahTerima;
use App\User;
use App\MsLab;
use Validator;
use DataTables;
use Dit;

class TeknisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teknis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('barangs', 'serahterima')->findOrFail($id);
        $kartu_alat = [];
        foreach($order->barangs as $item) {
            $barang = KartuAlat::with('barang')->where('barang_id', $item->id)->get();
            array_push($kartu_alat, [
                'kartu_alat' => $barang
            ]);
        }
        $auth_id = \Auth::user()->id;
        $user = User::where('id', '!=', $auth_id)->get();

        return view('admin.teknis.view', compact('order', 'kartu_alat', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checked($check, $id, $order_id)
    {
        /**
         * NOTE !!
         * paraf_sertifikat = verif sertifikat
         * paraf_selesai    = sertifikat
         */
        $paraf = 'paraf_'.$check;

        $kartu_alat = KartuAlat::find($id);
        $barang     = Barang::find($id);
        $finance      = Finance::find($order_id);

        if (is_null($kartu_alat->$paraf)) {
            $kartu_alat->update([
                'paraf_'.$check => '*',
                'tgl_'.$check   => date('d-m-Y')
            ]);
        } else {
            $kartu_alat->update([
                'paraf_'.$check => NULL,
                'tgl_'.$check   => NULL
            ]);
        }

        if($kartu_alat->paraf_administrasi != NULL) {
            if ($kartu_alat->paraf_sertifikat != NULL) {
                $barang->update([
                    'AS' => 'A-S'
                ]);
                $finance->update([
                    'status' => 'siap_tagih'
                ]);
            } else {
                $barang->update([
                    'AS' => 'A'
                ]);
            }
        }

        if ($kartu_alat) {
            return response()->json([
                'status'        => true,
                'msg'           => ucfirst($check).' berhasil di perbaharui',
                'data'          => $kartu_alat,
                'sertifikat'    => isset($sertifikat) ? $sertifikat : false
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'msg'    => ucfirst($check).' gagal di perbaharui',
                'data'    => $kartu_alat,
            ], 500);
        }
    }

    public function serahterima(Request $request, $id)
    {

        $serahterima = SerahTerima::where('id_order', $id)->first();
        if ($serahterima) {
            $serahterima->update($request->all());
        } else {
            $request->merge(['id_order' => $id]);
            $serahterima = SerahTerima::create($request->all());
        }

        // Dit::Log(1,'Merubah data administrasi pada order '.$order->no_order, 'Success');
        toast('Kartu Alat updated successfully.','success');
        return back();
    }


    public function data()
    {
        /* $data = Barang::with('orders')->where('AS', NULL)->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('no_order', function($item) {
                        $no_order = $item->orders[0]['no_order'];
                        $option = '<br> <a href="'.route('teknis.edit', $item->id).'">Edit</a>';
                        return  $no_order.$option;
                    })
                    ->editColumn('created_at', function($item) {
                        return date('d-M-y', strtotime($item->orders[0]['created_at']));
                    })
                    ->addColumn('target_selesai', function($item) {
                        $tgl_masuk = strtotime($item->orders[0]['tgl_masuk']);
                        $tgl_selesai = strtotime("+".$item->orders[0]['hari_kerja']." day", $tgl_masuk);
                        $tgl_selesai = date('d-M-y', $tgl_selesai); 
                        return $tgl_selesai;
                    })
                    ->escapeColumns([])
                    ->make(true); */

        $data = Order::with('customer')->orderBy('created_at', 'ASC')->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('no_order', function($item) {
                        $no_order = $item->no_order;
                        $option = '<br> <a href="'.route('teknis.show', $item->id).'">Detail</a>';
                        return  $no_order.$option;
                    })
                    ->editColumn('created_at', function($item) {
                        $tgl = date('d-m-Y', strtotime($item->created_at));
                        return $tgl;
                    })
                    ->editColumn('hari_kerja', function($item) {
                        return $item->hari_kerja . ' Hari';
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
}
