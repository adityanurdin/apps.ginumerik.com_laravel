<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use Dit;
use PDF;
use Arr;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\Models\HistoryPembayaran;

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

        $pdf = PDF::loadView('pdf.FR-ADM-2', compact('order', 'sum', 'terbilang'));
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

    public function TodPrint($order_id)
    {
        $data   = session('select_tod'.$order_id); 
        $order = Order::with('customer')->findOrFail($order_id);

        $pdf    = Pdf::loadView('pdf.tod', compact('data', 'order'));
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).'-'.date('his').'.pdf' );
    }

    public function invoice($id)
    {
        $pembayaran = HistoryPembayaran::findOrFail($id);
        
        $finance   = Finance::whereId($pembayaran->finance_id)->first();

        $order  = Order::with('customer', 'barangs')
                        ->whereId($finance->order_id)
                        ->first();

        $barang_ids = explode(',', $pembayaran->barang_ids);
        $barangs = Barang::whereIn('id', $barang_ids)->get();

        $total = $barangs->sum('harga_satuan');

        // return $total;
        $pdf    = Pdf::loadView('pdf.invoice', compact('finance', 'order', 'pembayaran', 'barangs', 'total'));
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).'-'.date('his').'.pdf' );
    }

    public function kwitansi($id)
    {
        $pembayaran = HistoryPembayaran::findOrFail($id);
        // return $pembayaran;
        
        $finance   = Finance::whereId($pembayaran->finance_id)->first();

        $order  = Order::with('customer', 'barangs')
                        ->whereId($finance->order_id)
                        ->first();

        $pdf    = Pdf::loadView('pdf.kwitansi', compact('finance', 'order', 'pembayaran'));
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).'-'.date('his').'.pdf' );
    }

}
