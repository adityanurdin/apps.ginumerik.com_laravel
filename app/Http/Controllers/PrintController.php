<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dit;
use PDF;
use Arr;
use App\Models\Order;

class PrintController extends Controller
{
    
    public function formAdm2($id)
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
        $PPn      = $sum * 0.1;
        $grand_total = $sum + $PPn;
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        $pdf = PDF::loadView('pdf.form-adm-2', compact('order', 'sum', 'terbilang'));
        return $pdf->download($order->no_order.'-FORM-ADM-02 ('. date('d-m-y') .').pdf');
    }

    public function formAdm1($id)
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
        $PPn      = $sum * 0.1;
        $grand_total = $sum + $PPn;
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        $pdf = PDF::loadView('pdf.form-adm-1', compact('order', 'sum', 'terbilang'));
        return $pdf->download($order->no_order.'-FORM-ADM-01 ('. date('d-m-y') .').pdf');
    }

}
