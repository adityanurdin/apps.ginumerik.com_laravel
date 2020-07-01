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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $id;
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
                                $result .= '<a href='.route('administrasi.show', $item->id).'>View</a> <a href='.route('administrasi.edit', $item->id).'>Edit</a> <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                return $result;
                            })
                            ->editColumn('tgl_masuk', function($item) {
                                return date('d-M-y', strtotime($item->tgl_masuk));
                            })
                            ->addColumn('est_biaya', function($item) {

                                $nilai_satuan = [];
                                foreach ($item->barangs as $row) {
                                    array_push($nilai_satuan, [
                                        (int)$row->harga_satuan
                                    ]);
                                }
                                $collapse = Arr::collapse($nilai_satuan);
                                $sum      = array_sum($collapse);
                                return "Rp " . number_format($sum,2,',','.');
                            })
                            ->escapeColumns([])
                            ->make(true);
    }
}
