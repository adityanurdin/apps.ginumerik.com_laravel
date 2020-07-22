<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use Validator;
use DataTables;
use Dit;

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
        return view('admin.administrasi.barang.create', compact('order_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $order_id)
    {
        $order = Order::where('no_order', $order_id)->first();

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

        $barang = Barang::create($request->all());
        $barang->orders()->attach($order->id);

        $finance = Finance::where('order_id', $order->id)->first();

        $total_harga_barang = $request->harga_satuan * $request->alt;
        $total_bayar        = $total_harga_barang + $finance->total_bayar;
        $finance->update([
            'total_bayar' => $total_bayar
        ]);

        if ($barang) {
            toast('Barang create successfully.','success');
            return redirect()->route('administrasi.show', $order->id);
        } else {
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
        return view('admin.administrasi.barang.edit', compact('barang'));
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
        if ($barang) {
            $barang->update($request->all());
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

        $barang->delete();
        $barang->orders()->detach($order_id);
        
        $finance = Finance::where('order_id', $order_id)->first();

        $total_harga_barang = $barang->harga_satuan * $barang->alt;
        $total_bayar        = $finance->total_bayar - $total_harga_barang;

        $finance->update([
            'total_bayar' => $total_bayar
        ]);

        if($barang) {
            toast('Barang delete successfully.','success');
            return redirect()->route('administrasi.show', $order_id);
        } else {
            toast('Barang delete failed.','error');
            return redirect()->route('administrasi.index');
        }
    }
}
