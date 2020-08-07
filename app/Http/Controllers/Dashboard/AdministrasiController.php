<?php

/**
 * Welcome to Labs Litecloud.id, Develop your project into The Labs
 * 
 * Start Date : 23/06/2020 22:01
 * Developer  : Muhammad Aditya Nurdin
 * Link       : https://labs.litecloud.id
 * Project    : Internal App for PT. Gaya Instrumentasi Numerik
 */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\Setting;
use App\MsLab;
use Validator;
use DataTables;
use Arr;
use Dit;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.administrasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customer = Customer::all();
        $wizardID = 1;
        
        $order = Order::latest()->first();
        if ($order == null) {
            $get_order = Setting::where('key', 'no_order')->first();
            $no_order  = $get_order->value;
        } else {
            $unique_number = (int)substr($order->no_order, 8);
            $number = intval($unique_number) + 1;
            $year = date('y');
            $no_order = $year.' G '.str_pad($number, 5, 0, STR_PAD_LEFT);
            $no_order = substr_replace($no_order, ' ', 8).str_pad($number, 2, 0, STR_PAD_LEFT);
            // return $no_order;
        }

        // 20 G 000 01

        if (!is_null(session('wizardID'))) {
            if (session('wizardID')  != $wizardID ) {
                return redirect()->route('administrasi.create-wizard', session('wizardID'));
            }
        }


        return view('admin.administrasi.create', compact('customer', 'wizardID', 'no_order'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWizard(Request $request, $wizardID)
    {
        
        if ($wizardID == 1) {
            
            return redirect()->route('administrasi.create');

        } else if ($request->session()->has('wizardID') == false) {

            return redirect()->route('administrasi.create');

        } else if ($wizardID == 3) {
            $order = Order::where('no_order', session('no_order'))->first();
            $request->session()->forget('wizardID');
            $request->session()->forget('no_order');

            // $finance = Finance::where('order_id', $order->id)->first();
            // $total_bayar     = $finance->total_bayar + ($finance->total_bayar * 0.1);
            // $finance->update(['total_bayar' => $total_bayar]);

            toast('Order has been finished.','success');
            return redirect()->route('administrasi.show', $order->id);
        }

        $labs = MsLab::all();
        $order = Order::where('no_order', session('no_order'))->first();
        // return $order->barangs;

        return view('admin.administrasi.create', compact('wizardID', 'labs', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'nama_barang' => 'required'
        ]);

        if ($valid->fails()) {
            return response()->json([
                'status' => false,
                'msg'    => $valid->errors()
            ]);
        }

        $barang = Barang::create($request->except(['wizardID']));
        $order  = Order::where('no_order', session('no_order'))->first();
        $barang->orders()->attach($order->id);

        
        $finance = Finance::where('order_id', $order->id)->first();

        $total_harga_barang = $request->harga_satuan * $request->alt;
        $total_bayar        = $total_harga_barang + $finance->total_bayar;
        $finance->update([
            'total_bayar' => $total_bayar
        ]);

        if ($barang) {
            $msg = 'Menambahkan barang '.$barang->nama_barang.' pada order '. $order->no_order;
            Dit::Log(1,$msg, 'success');
            return response()->json([
                'status' => true,
                'msg'    => 'Barang created successfully.',
                'data'   => $barang
            ],200);
        } else {
            Dit::Log(0,'Menambahkan barang '.$barang->nama_barang.' pada order '. $order->no_order, 'error');
            return response()->json([
                'status' => false,
                'msg'    => 'Barang created failed.'
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param int $next
     * @return \Illuminate\Http\Response
     */
    public function storeWizard(Request $request, $next)
    {

        Validator::make($request->all(), [
            'no_order' => 'unique:orders'
        ])->validate();

        $request->session()->put('wizardID', $request->wizardID);
        $request->session()->put('no_order', $request->no_order);

        if (session('wizardID') == 2) {

            $order = Order::create($request->except(['wizardID']));

            $lama_kerja = $order->hari_kerja + 7;
            $tgl_tagihan = strtotime($order->created_at);
            $tgl_tagihan = strtotime("+".$lama_kerja." day", $tgl_tagihan);
            $tgl_tagihan = date('Y-m-d', $tgl_tagihan);
            
            $finance = Finance::create(['order_id' => $order->id, 'tgl_tagihan' => $tgl_tagihan]);

            if ($order && $finance) {
                $msg = 'Membuat order '. $order->no_order;
                Dit::Log(1,$msg, 'success');
                toast('Order created successfully.','success');
                return redirect()->route('administrasi.create-wizard', $next);
            } else {
                Dit::Log(0,'Order created failed', 'error');
            }
            
        }

        return redirect()->route('administrasi.create-wizard', $next);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $nilai_satuan = [];
        foreach ($order->barangs as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $PPn      = $sum * 0.1;
        $grand_total = Dit::GrandTotal($order->finance['id']);
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        return view('admin.administrasi.view', compact('order', 'sum', 'terbilang', 'grand_total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.administrasi.edit', compact('order'));
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
        $order = Order::find($id);
        $order->update($request->all());
        if ($order) {
            Dit::Log(1,'Merubah data administrasi pada order '.$order->no_order, 'Success');
            toast('Order updated successfully.','success');
            return redirect()->route('administrasi.index');
        } else {
            toast('Order updated failed.','error');
            return redirect()->route('administrasi.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $id_barang = [];
        foreach($order->barangs as $item) {
            array_push($id_barang, [
                'id' => $item->id
            ]);
        }
        $order->delete();
        $order->barangs()->detach();

        Barang::destroy(collect($id_barang));

        if ($order) {
            Dit::Log(1,'Menghapus order '.$order->no_order, 'success');
            return response()->json([
                'status' => true,
                'msg'    => 'Order deleted successfully.',
                'data'   => $order
            ],200);
        }
        Dit::Log(0,'Menghapus order '.$order->no_order, 'error');

    }

     /**
     * Return data json for datatables serverside
     */
    public function data()
    {
        $data = Order::with('customer')->orderBy('created_at', 'DESC')->get();
        // return $data;
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $result = ucfirst($item->no_order). '<br>';
                                $result .= '<a href='.route('administrasi.show', $item->id).'>Detail</a> <a href="'.route('administrasi.edit', $item->id).'">Edit</a>  <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                return $result;
                            })
                            ->editColumn('tgl_masuk', function($item) {
                                return date('d-M-y', strtotime($item->tgl_masuk));
                            })
                            ->escapeColumns([])
                            ->make(true);
    }
}
