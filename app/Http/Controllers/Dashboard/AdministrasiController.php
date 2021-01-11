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
use Illuminate\Database\Eloquent\Builder;


use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\Models\KartuAlat;
use App\Models\HistoryPembayaran;
use App\Setting;
use App\Log;
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
            $tahun = (int)substr($no_order, 0, 2);
            $year = date('y');
            if ( $tahun != $year) {
                $unique_number = 0;
                $number = intval($unique_number) + 1;
                $no_order = $year.' G '.str_pad($number, 5, 0, STR_PAD_LEFT);
                $no_order = substr_replace($no_order, ' ', 8).str_pad($number, 2, 0, STR_PAD_LEFT);
            } else {
                $no_order = $get_order->value;
            }
        } else {
            $tahun = (int)substr($order->no_order, 0, 2);
            $year = date('y');
            if ( $tahun != $year) {
                $unique_number = 0;
            } else {
                $unique_number = (int)substr($order->no_order, 8);
            }
            $number = intval($unique_number) + 1;
            $no_order = $year.' G '.str_pad($number, 5, 0, STR_PAD_LEFT);
            $no_order = substr_replace($no_order, ' ', 8).str_pad($number, 2, 0, STR_PAD_LEFT);
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
            
            $order = Order::with('barangs')
                            ->where('no_order', session('no_order'))
                            ->first();
            $finance = Finance::where('order_id', $order->id)->first();
            $barang_ids = [];
            foreach($order->barangs as $item) {
                array_push($barang_ids, [
                    $item->id,
                ]);
            }
            $kartu_alat = KartuAlat::whereIn('barang_id', $barang_ids)->get();
            $kartu_alat_ids = [];
            foreach($kartu_alat as $item) {
                array_push($kartu_alat_ids, [
                    $item->id,
                ]);
            }
            if (!empty($barang_ids)) {
                Barang::destroy($barang_ids);
                KartuAlat::destroy($kartu_alat_ids);
            }
            $order->delete();
            $finance->delete();
            $order->barangs()->detach();
            
            $request->session()->forget('wizardID');
            $request->session()->forget('no_order');
            $request->session()->forget('customer');
            return redirect()->route('administrasi.create');

        } else if ($request->session()->has('wizardID') == false) {

            return redirect()->route('administrasi.create');

        } else if ($wizardID == 3) {
            $order = Order::where('no_order', session('no_order'))->first();
            $request->session()->forget('wizardID');
            $request->session()->forget('no_order');
            $request->session()->forget('customer');

            // $finance = Finance::where('order_id', $order->id)->first();
            // $total_bayar     = $finance->total_bayar + ($finance->total_bayar * 0.1);
            // $finance->update(['total_bayar' => $total_bayar]);

            toast('Order has been finished.','success');
            return redirect()->route('administrasi.show', $order->id);
        }

        $labs = MsLab::all();
        $order = Order::where('no_order', session('no_order'))->first();
        // return $order;

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
            'nama_barang' => 'required',
            'alt'         => 'required|integer',
            'st'          => 'required',
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
        
        $barang = Barang::create($request->except(['wizardID']));
        $order  = Order::where('no_order', session('no_order'))->first();
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

        $customer = Customer::find($request->customer_id);

        $request->session()->put('wizardID', $request->wizardID);
        $request->session()->put('no_order', $request->no_order);
        $request->session()->put('customer', $customer);

        if (session('wizardID') == 2) {

            $jenis_pekerjaan = implode(' / ', $request->jenis_pekerjaan);
            $request->merge(['jenis_pekerjaan' => $jenis_pekerjaan]);
            $order = Order::create($request->except(['wizardID', 'pph', 'discount', 'tat']));

            /* $lama_kerja = $order->hari_kerja + 7;
            $tgl_tagihan = strtotime($order->created_at);
            $tgl_tagihan = strtotime("+".$lama_kerja." day", $tgl_tagihan);
            $tgl_tagihan = date('Y-m-d', $tgl_tagihan); */
            
            // $finance = Finance::create(['order_id' => $order->id, 'tgl_tagihan' => $tgl_tagihan]);
            $finance = Finance::create([
                    'order_id'  => $order->id,
                    'status'    => 'dalam_proses',
                    'pph'       => $request->has('pph') ? $request->pph : NULL,
                    'discount'  => $request->has('discount') ? $request->discount : NULL,
                    'tat'       => $request->has('tat') ? $request->tat : NULL,
            ]);

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
        $barangs = Barang::where('status_batal', '0')
                        ->get();

        $orders = Order::find($id)
                        ->barangs()
                        ->where('status_batal', '0')
                        ->get();
                        // return $orders;

        $nilai_satuan = [];
        foreach ($orders as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $grand_total = Dit::GrandTotal($order->finance['id']);
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        // return $sum;

        $auth_id = \Auth::user()->id;
        $user = User::get();

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
        $jenis_pekerjaan = str_replace(' / ',', ', $order->jenis_pekerjaan);
        return view('admin.administrasi.edit', compact('order', 'jenis_pekerjaan'));
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
        $order      = Order::find($id);
        $finance    = Finance::where('order_id', $order->id)->first();

        $jenis_pekerjaan = implode(' / ', $request->jenis_pekerjaan);
        $request->merge(['jenis_pekerjaan' => $jenis_pekerjaan]);

        $order->update($request->except(['pph', 'discount', 'tat']));
        if ($order) {
            $finance->update($request->only(['pph', 'discount', 'tat']));
            if ($finance) {
                Dit::Log(1,'Merubah data administrasi pada order '.$order->no_order, 'Success');
                toast('Order updated successfully.','success');
                return redirect()->route('administrasi.index');
            } else {
                toast('Order updated failed.','error');
                return redirect()->route('administrasi.index');
            }
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
                $tahun = date('y');
                $new_barang = Barang::where('no_sertifikat', 'like' , '%.G.Sert%')
                                    ->whereYear('created_at', date('Y'))->latest()->first();
                // return $new_barang;
                $check_barang = Barang::whereYear('created_at', date('Y'))->first();
                $number = $new_barang->no_sertifikat;
                // $year   = substr($number, 15);
                if (!$check_barang) {
                    $number = '0000';
                }else {
                    $number = substr($number, 0, 4);
                }
                // return $number;
                $no_urut = str_pad($number + 1, 4, 0, STR_PAD_LEFT);
                $no_sertifikat = $no_urut.'.G.Sert/'.date('m/y');
                return $no_sertifikat;
            } else {
                $check_barang = Barang::whereYear('created_at', date('Y'))->first();
                $tahun = date('y');
                $number = $barang->no_sertifikat;
                // $year   = substr($number, 15);
                if (!$check_barang) {
                    $number = '0000';
                }else {
                    $number = substr($number, 0, 4);
                }
                // return $number;
                // if ($tahun == $year) {
                //     if ($number >= 0001) {
                //         $number = '0000';
                //     } else {
                //         $number = $number;
                //     }
                // }
                $no_urut = str_pad($number + 1, 4, 0, STR_PAD_LEFT);
                $no_sertifikat = $no_urut.'.G.Sert/'.date('m/y');
                // return $no_sertifikat;
            }

        }

        return $no_sertifikat;
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

     /**
     * Return data json for datatables serverside
     */
    public function data()
    {
        $data = Order::with('customer', )
                    ->whereHas('finance', function(Builder $query) {
                        $query->where('status', '!=', 'sudah_bayar');
                    })
                    // ->orderBy('created_at', 'AS')
                    ->get();
        // return $data;
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $result = ucfirst($item->no_order). '<br>';
                                $result .= '<a href='.route('administrasi.show', $item->id).'>Detail</a>';
                                if ($item->finance['status'] !== 'sudah_bayar') {
                                    $result .= ' <a href="'.route('administrasi.edit', $item->id).'">Edit</a>  <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                }
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
        $order      = Order::findOrFail($id);
        $pembayaran = HistoryPembayaran::where('finance_id', $order->finance['id'])->first();

        $nilai_satuan = [];
        $barangs = Order::find($id)
                            ->barangs()
                            ->where('status_batal', '0')
                            ->get();
        foreach ($barangs as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $total      = array_sum($collapse);
        $subtotal   = $total - $order->finance['discount'];
        $ppn        = $subtotal * 0.1;
        $pph        = $order->finance['pph'] == 'on' ? $subtotal * 0.02 : 0;
        $grand_total = Dit::GrandTotal($order->finance['id']);

        return view('admin.administrasi.input.show', compact('order', 'total', 'subtotal', 'ppn', 'pph', 'grand_total', 'pembayaran'));
    }

    public function dataInput()
    {
        $data = Order::with('customer')->orderBy('created_at', 'DESC')->get();
        // return $data;
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $result = ucfirst($item->no_order). '<br>';
                                $result .= '<a href='.route('administrasi.show.input', $item->id).'>Lihat</a> <a href="'.route('print.input', $item->id).'">Print</a>';
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
                                $result .= '<a href='.route('administrasi.show.tod', $item->id).'>Lihat</a>';
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
        $data = Order::with('tod', 'barangs')->findOrFail($id);
        $select = session('select_tod'.$id);
        return view('admin.administrasi.ToD.show', compact('data', 'select'));
    }

    public function storeTD(Request $request, $order_id)
    {
        $data = session('select_tod'.$order_id);

        if(isset($data)) {
            if ($request->nama_doc) {
                $select = $data['select_tod'];
            } else {
                $select = [];
            }
        } else {
            $select = [];
        }

        $no     = 1;

        if (isset($data)) {

            if ($request->nama_doc) {
                // return $select;
                array_push($select, [
                    'id'            => count($data['select_tod']) + 1,
                    'nama_doc'      => $request->nama_doc,
                    'spesifikasi'   => $request->spesifikasi,
                    'volume'        => $request->volume,
                    'keterangan'    => $request->keterangan
                ]);
                
            } else {
                foreach($data['select_tod'] as $item) {
                    array_push($select, [
                        'id'            => $item['id'],
                        'nama_doc'      => $item['nama_doc'],
                        'spesifikasi'   => $request->spesifikasi[$item['id'] - 1],
                        'volume'        => $request->volume[$item['id'] - 1],
                        'keterangan'    => $request->keterangan[$item['id'] - 1]  
                    ]);
                }
            }
        } else {
        
            foreach($request->select_tod as $item) {
                array_push($select, [
                    'id'            => $no++,
                    'nama_doc'      => $item,
                    'spesifikasi'   => '-',
                    'volume'        => '-',
                    'keterangan'    => '-'  
                ]);
            }

        }
        
        $payload = [
            'order_id' => $order_id,
            'select_tod' => $select
        ];
        $request->session()->put('select_tod'.$order_id, $payload);
        return back();
    }

    public function destroyTD(Request $request, $order_id)
    {
        $request->session()->forget('select_tod'.$order_id);
        return back();
    }

    public function lacak()
    {
        $order = Order::all();
        return view('admin.administrasi.lacak.index', compact('order'));
    }

    public function letsLacak(Request $request)
    {
        $log = Log::where('status', 1)
                    ->where('msg', 'LIKE', '%'.$request->no_order)
                    ->orderBy('created_at', 'DESC')
                    // ->limit(5)
                    ->get();

        $new_log = [];
        foreach($log as $item) {
            array_push($new_log, [
                'user' => ucfirst(User::find($item->user_id)->name),
                'msg'  => $item->msg,
                'created_at' => $item->created_at
            ]);
        }

        return response()->json([
            'status' => true,
            'msg'    => 'Berhasil mencari data',
            'data'   => $new_log
        ]);
    }

    public function lag()
    {
        $lag = Barang::with('orders')
                        ->where('AS', NULL)
                        ->where('LAG', '!=', NULL)
                        ->orderBy('LAG', 'DESC')
                        ->get();
        return view('admin.administrasi.lag', compact('lag'));
    }

}
