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
use App\Models\KartuAlat;
use App\Models\HistoryPembayaran;

class PrintController extends Controller
{
    
    public function formAdm2($id)
    {
        $order = Order::find($id);
        $barangs = Order::find($id)
                            ->barangs()
                            ->where('status_batal', '0')
                            ->get();

        $orders = Order::find($id)
                        ->barangs()
                        ->where('status_batal', '0')
                        ->get();

        $nilai_satuan = [];
        foreach ($orders as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $PPn      = $sum * 0.1;
        // $grand_total = $sum + $PPn;
        $grand_total = Dit::GrandTotal($order->finance['id']);
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        $pdf = PDF::loadView('pdf.FR-ADM-2', compact('order', 'sum', 'terbilang', 'grand_total'))
                            ->setOption('margin-bottom', 42)
                            ->setOption('margin-top', 42);
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' FR-ADM-02 .pdf' );
    }

    public function formAdm1($id)
    {
        $order = Order::find($id);
        $barangs = Order::find($id)
                            ->barangs()
                            ->where('status_batal', '0')
                            ->get();

        $nilai_satuan = [];
        foreach ($barangs as $row) {
            array_push($nilai_satuan, [
                (int)$row->harga_satuan * $row->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $sum      = array_sum($collapse);
        $PPn      = $sum * 0.1;
        $grand_total = $sum + $PPn;
        $terbilang = ucfirst(Dit::terbilang($grand_total));

        $pdf = PDF::loadView('pdf.form-adm-1', compact('order', 'sum', 'terbilang'))
                        ->setOption('margin-bottom', 42)
                        ->setOption('margin-top', 42);
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' FR-ADM-01 .pdf' );
    }

    public function TodPrint($order_id)
    {
        $data   = session('select_tod'.$order_id); 
        $order = Order::with('customer')->findOrFail($order_id);

        $pdf    = Pdf::loadView('pdf.transfer-of-doc', compact('data', 'order'))
                                ->setOption('margin-bottom', 42)
                                ->setOption('margin-top', 42);
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' Transfer of Document & Equipment .pdf' );
    }

    public function invoice($id, Request $request)
    {
        $pembayaran = HistoryPembayaran::findOrFail($id);
        $finance    = Finance::findOrFail($pembayaran->finance_id);

        $barang_ids = explode(',', $pembayaran->barang_ids);
        $barang = Barang::whereIn('id', $barang_ids)->where('status_batal', '0')->get();
        $nilai_satuan = [];
        foreach($barang as $item) {
            array_push($nilai_satuan, [
                (int)$item->harga_satuan * $item->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $total      = array_sum($collapse);
        $discount   = $pembayaran->discount == 'on' ? $finance->discount : 0;
        $subtotal = $total - $discount;
        $ppn      = $subtotal * 0.1;
        $pph      = $finance->pph == 'on' ? $subtotal * 0.02 : 0;
        $tat      = $pembayaran->tat == 'on' ? $finance->tat : 0;
        $grand_total = $subtotal + $ppn + $pph + $tat;

        $order  = Order::with('customer', 'barangs')
                        ->whereId($finance->order_id)
                        ->first();

        $barang_ids = explode(',', $pembayaran->barang_ids);
        $barangs = Barang::whereIn('id', $barang_ids)->get();
        $data = [
            'finance',
            'order',
            'pembayaran',
            'barangs',
            'total',
            'subtotal',
            'ppn',
            'pph',
            'tat',
            'grand_total',
            'discount'
        ];
        // $pdf    = Pdf::loadView('pdf.invoice-new', compact($data));
        $query = $request->all();
        $pdf    = Pdf::loadView('pdf.invoice-new', compact($data))
                            ->setOption('margin-bottom', 42)
                            ->setOption('margin-top', 42);
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' '.str_replace('/', '', $pembayaran->no_invoice).'.pdf' );
    }

    public function kwitansi($id)
    {
        $pembayaran = HistoryPembayaran::findOrFail($id);
        $finance    = Finance::findOrFail($pembayaran->finance_id);

        $barang_ids = explode(',', $pembayaran->barang_ids);
        $barang = Barang::whereIn('id', $barang_ids)->where('status_batal', '0')->get();
        $nilai_satuan = [];
        foreach($barang as $item) {
            array_push($nilai_satuan, [
                (int)$item->harga_satuan * $item->alt
            ]);
        }
        $collapse = Arr::collapse($nilai_satuan);
        $total      = array_sum($collapse);
        $discount   = $pembayaran->discount == 'on' ? $finance->discount : 0;
        $subtotal = $total - $discount;
        $ppn      = $subtotal * 0.1;
        $pph      = $finance->pph == 'on' ? $subtotal * 0.02 : 0;
        $tat      = $pembayaran->tat == 'on' ? $finance->tat : 0;
        $grand_total = $subtotal + $ppn + $pph + $tat;

        $order  = Order::with('customer', 'barangs')
                        ->whereId($finance->order_id)
                        ->first();

        $pdf    = Pdf::loadView('pdf.kwitansi', compact('finance', 'order', 'pembayaran', 'grand_total'));
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' '.str_replace('/', '', $pembayaran->no_kwitansi).'.pdf' );
    }

    public function formTk1($id)
    {
        $order = Order::findOrFail($id);

        $barangs = Order::find($id)
                            ->barangs()
                            ->where('status_batal', '0')
                            ->get();
        $barang_ids = [];
        foreach($barangs as $item) {
            array_push($barang_ids,[
                $item->id
            ]);
        }
        $barang_ids = Arr::collapse($barang_ids);
        $barang = KartuAlat::with('barang')->whereIn('barang_id', $barang_ids)->get();


        $pdf = PDF::loadView('pdf.FR-TK-1', compact('order', 'barang'))
                            ->setOption('margin-bottom', 42)
                            ->setOption('margin-top', 42);
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' FR-TK-01.pdf' );
    }

    public function input($id) 
    {
        $order      = Order::findOrFail($id);
        $pembayaran = HistoryPembayaran::where('finance_id', $order->finance['id'])->first();
        $barangs = Order::find($id)
                            ->barangs()
                            ->where('status_batal', '0')
                            ->get();

        $nilai_satuan = [];
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

        
        $pdf = PDF::loadView('pdf.input', compact('order', 'total', 'subtotal', 'ppn', 'pph', 'grand_total', 'pembayaran'))
                            ->setOption('margin-bottom', 42)
                            ->setOption('margin-top', 42);
        return $pdf->download($order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']).' FR-TK-01.pdf' );
    }

}
