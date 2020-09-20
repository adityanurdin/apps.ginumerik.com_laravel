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
use App\Models\KartuAlat;
use App\Models\HistoryPembayaran;
use App\Setting;
use App\TransferOfDoc;
use App\SerahTerima;
use App\User;
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

        if ($request->lab == 'sub_con') {
            $request->merge([
                // 'user_id'       => \Auth::user()->id,
                'no_sertifikat' => '-',
                'sub_lab'       => '-'
            ]);
        }

        // $request->merge(['user_id' => \Auth::user()->id]);
        $barang = Barang::create($request->except(['wizardID']));
        $order  = Order::where('no_order', session('no_order'))->first();
        $barang->orders()->attach($order->id);

        
        $finance = Finance::where('order_id', $order->id)->first();

        

        if ($barang) {
            $total_harga_barang = $request->harga_satuan * $request->alt;
            $total_bayar        = $total_harga_barang + $finance->total_bayar;
            $finance->update([
                'total_bayar' => $total_bayar,
                'sisa_bayar'  => $total_bayar
            ]);

            $kartu_alat = KartuAlat::create([
                'barang_id' => $barang->id
            ]);
            
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

            /* $lama_kerja = $order->hari_kerja + 7;
            $tgl_tagihan = strtotime($order->created_at);
            $tgl_tagihan = strtotime("+".$lama_kerja." day", $tgl_tagihan);
            $tgl_tagihan = date('Y-m-d', $tgl_tagihan); */
            
            // $finance = Finance::create(['order_id' => $order->id, 'tgl_tagihan' => $tgl_tagihan]);
            $finance = Finance::create(['order_id' => $order->id, 'status' => 'dalam_proses']);

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
        $order = Order::with('serahterima')->findOrFail($id);

        $nilai_satuan = [];
        foreach ($order->barangs as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $grand_total = Dit::GrandTotal($order->finance['id']);
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        // Kartu Alat
        $kartu_alat = array();
        foreach($order->barangs as $item) {
            $barang = KartuAlat::with('barang')->where('barang_id', $item->id)->get();
            array_push($kartu_alat, [
                'kartu_alat' => $barang
            ]);
        }
        $auth_id = \Auth::user()->id;
        $user = User::get();

        return view('admin.administrasi.view', compact('order', 'sum', 'terbilang', 'grand_total', 'kartu_alat', 'user'));
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

    public function sertifikat()
    {
        $barang = Barang::latest()->first();

    
        if ($barang === NULL) {
            $no_urut = Dit::Setting('no_sertifikat');
            $no_sertifikat = $no_urut.'.G.Sert/'.date('m/y');
        } else {
            if ($barang->no_sertifikat == '-') {
                $new_barang = Barang::where('no_sertifikat', 'like' , '%.G.Sert%')->latest()->first();
                $number = $new_barang->no_sertifikat;
                $number = substr($number, 0, 4);
                // return $number;
                $no_urut = str_pad($number + 1, 4, 0, STR_PAD_LEFT);
                $no_sertifikat = $no_urut.'.G.Sert/'.date('m/y');
                return $no_sertifikat;
            } else {
                $number = $barang->no_sertifikat;
                $number = substr($number, 0, 4);
                // return $number;
                $no_urut = str_pad($number + 1, 4, 0, STR_PAD_LEFT);
                $no_sertifikat = $no_urut.'.G.Sert/'.date('m/y');
            }

        }

        return $no_sertifikat;
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

    // Input

    public function inputIndex()
    {
        return view('admin.administrasi.input.index');
    }

    public function showInput($id)
    {
        $data       = Order::with('customer', 'barangs', 'finance')->find($id);

        $nilai_satuan = [];
        foreach ($data->barangs as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $grand_total = Dit::GrandTotal($data->finance['id']);

        $pembayaran = HistoryPembayaran::where('finance_id', $data->finance['id'])
                                        ->first();
        return view('admin.administrasi.input.show', compact('data', 'pembayaran', 'sum', 'grand_total'));
    }

    public function dataInput()
    {
        $data = Order::with('customer')->orderBy('created_at', 'DESC')->get();
        // return $data;
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $result = ucfirst($item->no_order). '<br>';
                                $result .= '<a href='.route('administrasi.show.input', $item->id).'>Lihat</a> <a href="#">Print</a>';
                                return $result;
                            })
                            ->editColumn('tgl_masuk', function($item) {
                                return date('d-M-y', strtotime($item->tgl_masuk));
                            })
                            ->escapeColumns([])
                            ->make(true);
    }

    // ToD
    public function indexTD()
    {
        return view('admin.administrasi.ToD.index');
    }

    public function dataTD()
    {
        $data = Order::with('customer')->orderBy('created_at', 'DESC')->get();
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $result = ucfirst($item->no_order). '<br>';
                                $result .= '<a href='.route('administrasi.show.tod', $item->id).'>Lihat</a> <a href="#">Print</a>';
                                return $result;
                            })
                            ->editColumn('tgl_masuk', function($item) {
                                return date('d-M-y', strtotime($item->tgl_masuk));
                            })
                            ->escapeColumns([])
                            ->make(true);
    }

    public function showTD($id)
    {
        $data = Order::with('tod')->findOrFail($id);
        return view('admin.administrasi.ToD.show', compact('data'));
    }

    public function storeTD(Request $request, $order_id)
    {
        $request->merge(['order_id' => $order_id]);
        $data = TransferOfDoc::create($request->all());
        if ($data) {
            toast('Berhasil menambahkan Transfer of Doc.','success');
            return redirect()->route('administrasi.show.tod', $order_id);
        }
    }
}
