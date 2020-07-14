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
use App\Setting;
use Validator;
use DataTables;
use Arr;

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
        
        /* $order = Order::latest()->first();
        if ($order == null) {
            $get_order = Setting::where('key', 'no_order')->first();
            $no_order  = $get_order->value;
        } else {
            $unique_number = (int)substr($order->no_order, 8);
            $number = intval($unique_number) + 1;
            $year = date('y');
            $no_order = $year.' G '.str_pad($number, 4, 0, STR_PAD_LEFT);
            return $no_order;
        } */

        if (!is_null(session('wizardID'))) {
            if (session('wizardID')  != $wizardID ) {
                return redirect()->route('administrasi.create-wizard', session('wizardID'));
            }
        }


        return view('admin.administrasi.create', compact('customer', 'wizardID'));
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
            $request->session()->forget('wizardID');
            $request->session()->forget('no_order');
            toast('Order has been finished.','success');
            return redirect()->route('administrasi.index');
        }

        return view('admin.administrasi.create', compact('wizardID'));
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

        if ($barang) {
            return response()->json([
                'status' => true,
                'msg'    => 'Barang created successfully.',
                'data'   => $barang
            ],200);
        } else {
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
        
        $request->session()->put('wizardID', $request->wizardID);
        $request->session()->put('no_order', $request->no_order);

        if (session('wizardID') == 2) {

            $order = Order::create($request->except(['wizardID']));

            toast('Order created successfully.','success');
            return redirect()->route('administrasi.create-wizard', $next);
            
        }

        return redirect()->route('administrasi.create-wizard', $next);

    }

    static function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = Self::penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = Self::penyebut($nilai/10)." puluh". Self::penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . Self::penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = Self::penyebut($nilai/100) . " ratus" . Self::penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . Self::penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = Self::penyebut($nilai/1000) . " ribu" . Self::penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = Self::penyebut($nilai/1000000) . " juta" . Self::penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = Self::penyebut($nilai/1000000000) . " milyar" . Self::penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = Self::penyebut($nilai/1000000000000) . " trilyun" . Self::penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	static function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(Self::penyebut($nilai));
		}     		
		return $hasil;
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        $nilai_satuan = [];
        foreach ($order->barangs as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $terbilang = ucfirst(Self::terbilang($sum));

        return view('admin.administrasi.view', compact('order', 'sum', 'terbilang'));
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

     /**
     * Return data json for datatables serverside
     */
    public function data()
    {
        $data = Order::with('barangs', 'customer')->get();
        // return $data;
        return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $result = ucfirst($item->no_order). '<br>';
                                $result .= '<a href='.route('administrasi.show', $item->id).'>View</a> <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                return $result;
                            })
                            ->editColumn('tgl_masuk', function($item) {
                                return date('d-M-y', strtotime($item->tgl_masuk));
                            })
                            /* ->addColumn('est_biaya', function($item) {

                                $nilai_satuan = [];
                                foreach ($item->barangs as $row) {
                                    array_push($nilai_satuan, [
                                        (int)$row->harga_satuan
                                    ]);
                                }
                                $collapse = Arr::collapse($nilai_satuan);
                                $sum      = array_sum($collapse);
                                return "Rp " . number_format($sum,2,',','.');
                            }) */
                            ->escapeColumns([])
                            ->make(true);
    }
}
