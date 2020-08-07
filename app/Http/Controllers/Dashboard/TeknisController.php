<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\MsLab;
use Validator;
use DataTables;
use Dit;

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
        //
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
        // $data = Order::with('barangs')->orderBy('created_at', 'ASC')->get();
        $data = Barang::with('orders')->where('AS', NULL)->get();
        // return $data;
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
                    ->make(true);
    }
}
