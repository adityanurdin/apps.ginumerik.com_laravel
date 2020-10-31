<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use DataTables;
use Arr;
use Dit;

class ArchivedController extends Controller
{
    public function index($year) 
    {
        if ($year > date('Y')) {
            abort(404);
        }

        $order = Order::whereYear('created_at', $year)
                        ->get();
        return view('admin.archive.index', compact('year'));

    }

    public function data($year, $section)
    {
        if ($section == 'ADM') {

            $data = Order::with('customer')
                        ->whereYear('created_at', $year)
                        ->get();
            $datatable = Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('no_order', function($item) {
                            $result = ucfirst($item->no_order). '<br>';
                            $result .= '<a href='.route('administrasi.show', $item->id).'>Detail</a>';
                            return $result;
                        })
                        ->editColumn('tgl_masuk', function($item) {
                            return date('d-M-y', strtotime($item->tgl_masuk));
                        })
                        ->escapeColumns([])
                        ->make(true);

        } else if ($section == 'FIN') {

            $data = Order::with('customer', 'finance')
                            ->whereYear('created_at', $year)
                            ->get();
            $datatable =  Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('no_order', function($item) {
                $result = ucfirst($item->no_order). '<br>';
                $result .= '<a href='.route('finance.show', $item->id).'>Pembayaran</a> <a href='.route('administrasi.show.tod', $item->id).'>Documment</a>';
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
                $total_bayar = $item->finance['grand_total'];
                $total_bayar = Dit::Rupiah($total_bayar);

                return $total_bayar;
            })
            ->addColumn('status', function($item) {
                if ($item->finance['status'] == 'dalam_proses') {
                    $status = 'Dalam Proses';
                } else if ($item->finance['status'] == 'siap_tagih') {
                    $status = 'Siap Tagih';
                } else if ($item->finance['status'] == 'tagih'){
                    $status = 'Tagih';
                } else if ($item->finance['status'] == 'sudah_bayar') {
                    $status = 'Sudah Bayar';
                }
                return $status;
            })
            ->escapeColumns([])
            ->make(true);

        } else if ($section == 'TEK') {

            $data = Order::with('customer')
                        ->whereYear('created_at', $year)
                        ->get();
                $datatable =  Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('no_order', function($item) {
                                $no_order = $item->no_order;
                                $option = '<br> <a href="'.route('teknis.show', $item->id).'">Detail</a>';
                                return  $no_order.$option;
                            })
                            ->editColumn('created_at', function($item) {
                                $tgl = date('d-m-Y', strtotime($item->created_at));
                                return $tgl;
                            })
                            ->editColumn('hari_kerja', function($item) {
                                return $item->hari_kerja . ' Hari';
                            })
                            ->escapeColumns([])
                            ->make(true);

        } else {
            abort(404);
        }

        return $datatable;

    }
}
