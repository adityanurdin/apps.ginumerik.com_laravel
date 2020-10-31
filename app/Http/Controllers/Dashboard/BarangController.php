<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\Models\KartuAlat;
use App\MsLab;
use App\SerahTerima;
use Validator;
use DataTables;
use Dit;
use Arr;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order_id)
    {
        $labs = MsLab::all();
        $order = Order::where('no_order' ,$order_id)
                    ->first();
        return view('admin.administrasi.barang.create', compact('order_id', 'labs', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $order_id)
    {
        // return $request->all();
        $valid = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'alt'         => 'required',
            'harga_satuan' => 'required'
        ]);
        if ($valid->fails()) {
            return response()->json([
                'status' => false,
                'msg'    => $valid->errors()
            ]);
        }

        if ($request->lab == 'sub_con') {
            $request->merge([
                'no_sertifikat' => '-',
                'sub_lab'       => '-'
            ]);
        }

        $barang = Barang::create($request->all());
        $order  = Order::where('no_order', $order_id)->first();
        $barang->orders()->attach($order->id);

        $finance = Finance::where('order_id', $order->id)->first();

        if ($barang) {

            $total_harga_barang = $request->harga_satuan * $request->alt;
            $total_bayar        = $total_harga_barang + $finance->total_bayar;

            $subtotal = $total_bayar - $finance->discount;
            $ppn      = $subtotal * 0.1;
            $pph      = $finance->pph == 'on' ? $subtotal * 0.02 : 0;
            $tat      = $finance->tat;
            $grand_total = $subtotal + $ppn + $pph + $tat;

            $finance->update([
                'total_bayar' => $total_bayar,
                'sisa_bayar'  => $grand_total,
                'grand_total' => $grand_total,
            ]);
            $kartu_alat = KartuAlat::create([
                'barang_id' => $barang->id
            ]);
        }




        if ($barang) {
            $msg = 'Menambahkan barang '.$barang->nama_barang.' pada order '. $order->no_order;
            Dit::Log(1,$msg, 'success');

            toast('Barang create successfully.','success');
            return redirect()->route('administrasi.show', $order->id);
        } else {
            Dit::Log(0,'Menambah barang '.$request->nama_barang, 'Error');
            toast('Barang create failed.','success');
            return redirect()->route('administrasi.show', $order->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id, $id)
    {
        $barang = Barang::find($id);
        $labs = MsLab::all();
        return view('admin.administrasi.barang.edit', compact('barang', 'labs'));
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
        $barang = Barang::find($id);
        $order  = Order::find($barang->orders[0]['id']);
        $finance = Finance::where('order_id', $barang->orders[0]['id'])->first();
        $harga_barang = $barang->harga_satuan;
        
        if ($barang) {
            $request->merge([
                'fisik' => $request->fisik ? $request->fisik : NULL,
                'fungsi' => $request->fungsi ? $request->fungsi : NULL,
                'sdm' => $request->sdm ? $request->sdm : NULL,
                'std' => $request->std ? $request->std : NULL,
            ]);
            $barang->update($request->all());

            if ($harga_barang != $request->harga_satuan) {
                /* return response()->json([
                    'status' => false,
                    'message'    => 'Fitur ini masih terdapat bug, sehingga ditutup sementara',
                    'developer' => [
                        'Nama'      => 'Muhammad Aditya Nurdin',
                        'instagram' => 'https://instagram.com/abubakarr_ra',
                        'facebook'  => 'https://facebook.com/adityanurdin0',
                        'mail'      => 'adityanurdin0@gmail.com'
                    ]
                ]); */

                $total = [];
                foreach ($order->barangs as $item) {
                    array_push($total, [
                        (int)$item->harga_satuan * $item->alt
                    ]);
                }
                $total = Arr::collapse($total);
                $total      = array_sum($total);
    
                $subtotal = $total - $finance->discount;
                $ppn      = $subtotal * 0.1;
                $pph      = $finance->pph == 'on' ? $subtotal * 0.02 : 0;
                $tat      = $finance->tat;
                $grand_total = $subtotal + $ppn + $pph + $tat;
                
                $finance->update([
                    'total_bayar' => $total,
                    'sisa_bayar'  => $grand_total,
                    'grand_total' => $grand_total,
                ]);
            }

            $msg = 'Merubah barang '.$barang->nama_barang.' pada order '. $order->no_order;
            Dit::Log(1,$msg, 'success');

            toast('Barang update successfully.','success');
            return redirect()->route('administrasi.show', $barang->orders[0]['id']);
        } else {
            toast('Barang update failed.','error');
            return redirect()->route('administrasi.show', $barang->orders[0]['id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id, $id)
    {
        $barang = Barang::find($id);
        $SerahTerima = SerahTerima::find($id);

        $barang->delete();
        $barang->orders()->detach($order_id);
        $SerahTerima->delete();
        
        $finance = Finance::where('order_id', $order_id)->first();
        $order   = Order::find($order_id);

        $total_harga_barang = $barang->harga_satuan * $barang->alt;
        $total_bayar        = $finance->total_bayar - $total_harga_barang;

        $finance->update([
            'total_bayar' => $total_bayar
        ]);

        if($barang) {
            $msg = 'Menghapus barang '.$barang->nama_barang.' pada order '. $order->no_order;
            Dit::Log(1,$msg, 'success');

            toast('Barang delete successfully.','success');
            return redirect()->route('administrasi.show', $order_id);
        } else {
            $msg = 'Gagal menghapus barang '.$barang->nama_barang.' pada order '. $order->no_order;
            Dit::Log(1,$msg, 'error');
            toast('Barang delete failed.','error');
            return redirect()->route('administrasi.index');
        }
    }
}
