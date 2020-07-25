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
        $PPn   = $order->finance['total_bayar'] * 0.1;
        $total_bayar = $order->finance['total_bayar'] + $PPn;
        return view('admin.finance.edit', compact('order', 'total_bayar'));
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
        $finance = Finance::findOrFail($id);
        $finance->update($request->all());

        if ($finance) {
            toast('Finance edit successfully.','success');
            return redirect()->route('finance.index');
        } else {
            toast('Finance edit failed.','error');
            return redirect()->route('finance.show', $id);
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
        //
    }

    public function data()
    {
        $data = Order::with('customer')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('no_order', function($item) {
                    $result = ucfirst($item->no_order). '<br>';
                    $result .= '<a href='.route('finance.show', $item->id).'>Edit</a>';
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
                ->addColumn('sisa_bayar', function($item) {
                    if ($item->finance['sisa_bayar'] == NULL) {
                        $sisa_bayar = 0;
                    } else {
                        $sisa_bayar = $item->finance['sisa_bayar'];
                    }
                    return Dit::Rupiah($sisa_bayar);
                })
                ->addColumn('status', function($item) {
                    if ($item->finance['status'] == NULL) {
                        $status = 'Belum Bayar';
                    } else {
                        $status = $item->finance['status'];
                    }
                    return $status;
                })
                ->escapeColumns([])
                ->make(true);
    }
}
