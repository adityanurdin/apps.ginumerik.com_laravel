<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
use Auth;

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
        $barang_id = [];
        foreach($order->barangs as $item) {
            array_push($barang_id, [
                $item->id
            ]);
        }

        $kartu_alat =  KartuAlat::with('barang')
                    ->whereIn('barang_id', $barang_id)
                    ->whereHas('barang', function(Builder $query) {
                        $query->where('status_batal' , '0');
                    })
                    ->get();
                    // return $kartu_alat;
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

        $kartu_alat = KartuAlat::findOrFail($id);
        $barang     = Barang::findOrFail($kartu_alat->barang_id);
        $finance      = Finance::findOrFail($order_id);
        $order      = Order::findOrFail($order_id);
        $user = Auth::user();

        if (is_null($kartu_alat->$paraf)) {

            $kartu_alat->update([
                'paraf_'.$check => '*',
                'tgl_'.$check   => date('d-m-Y')
            ]);
            
            if ($check == 'selesai') {
                $check = 'sertifikat';
            } else if ($check == 'sertifikat') {
                $check = 'verif sertifikat';
            }
            $msg = 'Melakukan centang paraf ' .$check. ' ' .$barang->nama_barang. ' pada order ' .$order->no_order;
            Dit::Log(1,$msg, 'success');

        } else {

            $kartu_alat->update([
                'paraf_'.$check => NULL,
                'tgl_'.$check   => NULL
            ]);
            
            if ($check == 'selesai') {
                $check = 'sertifikat';
            } else if ($check == 'sertifikat') {
                $check = 'verif sertifikat';
            }
            $msg = 'Menghapus centang paraf ' .$check. ' ' .$barang->nama_barang. ' pada order ' .$order->no_order;
            Dit::Log(1,$msg, 'success');

        }

        if ($paraf == 'paraf_alat') {
            if ($kartu_alat->paraf_alat == NULL) {
                $barang->update([
                    'AS' => NULL,
                    'user_id' => NULL
                ]);
            } else {
                $barang->update([
                    'AS' => 'A',
                    'user_id' => $user->id
                ]);
            }
        } else if($paraf = 'paraf_sertifikat') {
            if ($kartu_alat->paraf_sertifikat == NULL) {
                $barang->update([
                    'AS' => 'A'
                ]);
            } else {
                $barang->update([
                    'AS' => 'A-S'
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
        $order = Order::findOrFail($id);
        if ($serahterima) {
            $serahterima->update($request->all());
        } else {
            $request->merge(['id_order' => $id]);
            $serahterima = SerahTerima::create($request->all());
        }

        Dit::Log(1, 'Sukses serah terima kartu alat pada order '. $order->no_order, 'success');
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

        $data = Order::with('customer')
                        ->whereHas('finance', function(Builder $query) {
                            $query->where('status', '!=' , 'sudah_bayar');
                        })
                        ->orderBy('created_at', 'ASC')
                        ->get();
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

    public function summary()
    {
        $query  = '
        SELECT
        count(*) AS jumlah_alat, users.*
        from barangs
        inner join users on barangs.user_id = users.id where year(barangs.created_at) = '.date('Y').' group by barangs.user_id
        ORDER BY jumlah_alat DESC;
         ';
        $teknis = \DB::select(\DB::raw($query));

        return view('admin.teknis.summary.index', compact('teknis'));
    }

    public function summary_detail($id)
    {
        $barang = Barang::where('user_id', $id)->whereYear('created_at', date('Y'))->get();
        $user = User::find($id);
        
        return view('admin.teknis.summary.detail', compact('barang', 'user'));
    }

    // public function summary_data(Request $request)
    // {
    //     if (request()->ajax()) {
    //         if (!empty($request->from_date)) {
    //             $query  = '
    //             SELECT
    //             count(*) AS jumlah_alat, users.*
    //             from barangs
    //             inner join users on barangs.user_id = users.id where year(barangs.created_at) = '.date('Y').' group by barangs.user_id
    //             ORDER BY jumlah_alat DESC;
    //             ';
    //             $data = \DB::select(\DB::raw($query));
    //         } else {
    //             $query  = '
    //             SELECT
    //             count(*) AS jumlah_alat, users.*
    //             from barangs
    //             inner join users on barangs.user_id = users.id where year(barangs.created_at) = '.date('Y').' group by barangs.user_id
    //             ORDER BY jumlah_alat DESC;
    //             ';
    //             $data = \DB::select(\DB::raw($query));
    //         }
    //         return Datatables::of($data)
    //                         ->make(true);
    //     }
    // }
}
