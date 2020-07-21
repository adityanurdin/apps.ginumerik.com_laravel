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
use Dit;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.finance.index');
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
        $order = Order::findOrFail($id);
        return $order->finance;
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

    public function data()
    {
        $data = Order::with('customer')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('no_order', function($item) {
                    $result = ucfirst($item->no_order). '<br>';
                    $result .= '<a href='.route('finance.show', $item->id).'>Detail</a> <a href='.route('finance.edit', $item->id).'>Edit</a>';
                    return $result;
                })
                ->addColumn('tgl_tagihan', function($item) {
                    if ($item->finance['tgl_tagihan'] == NULL) {
                        $result = '-';
                    } else {
                        $result = date('d-M-y', strtotime($item->finance['tgl_tagihan']));
                    }
                    return $result;
                })
                ->addColumn('total_bayar', function($item) {
                    $PPn = $item->finance['total_bayar'] * 0.1;
                    $total_bayar = $item->finance['total_bayar'] + $PPn;
                    return Dit::Rupiah($total_bayar);
                })
                ->addColumn('status', function($item) {
                    if ($item->finance['status'] == NULL) {
                        $status = 'Belum Bayar';
                    } else if ($item->finance['sisa_bayar'] != 0) {
                        $status = 'Belum Lunas';
                    } else {
                        $status = 'Sudah Bayar';
                    }
                    return $status;
                })
                ->escapeColumns([])
                ->make(true);
    }
}
