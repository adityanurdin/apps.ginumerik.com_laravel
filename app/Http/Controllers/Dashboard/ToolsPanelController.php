<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Order;
use App\Models\Finance;
use App\Models\Barang;

use Validator;
use DataTables;
use Arr;
use Dit;

class ToolsPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tools-panel.index');
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

    public function recalculate(Request $request)
    {

        $order = Order::with(['finance', 'barangs'])->get();
        /* $finance = $order[158]->finance()->with(['HistoryPembayaran'])->first();
        $history_pembayaran = $finance->HistoryPembayaran()->where('status', 'Lunas')->get();
        $jumlah_bayar_lunas = [];
        foreach ($history_pembayaran as $item_pembayaran) {
            if ($item_pembayaran->status == 'Lunas') {
                array_push($jumlah_bayar_lunas, [
                    (int)$item_pembayaran->jumlah_bayar
                ]);
            }
        }
        $collapse_lunas = Arr::collapse($jumlah_bayar_lunas);
        $total_pembayaran_lunas = array_sum($collapse_lunas);

        return $finance; */
        try {
            foreach ($order as $item) {
                $finance = $item->finance;
                $history = $item->finance()->with(['HistoryPembayaran'])->first();
                $history_pembayaran = $history->HistoryPembayaran()->where('status', 'Lunas')->get();
                $jumlah_bayar_lunas = [];
                foreach ($history_pembayaran as $item_pembayaran) {
                    if ($item_pembayaran->status == 'Lunas') {
                        array_push($jumlah_bayar_lunas, [
                            (int)$item_pembayaran->jumlah_bayar
                        ]);
                    }
                }
                $collapse_lunas = Arr::collapse($jumlah_bayar_lunas);
                $total_pembayaran_lunas = array_sum($collapse_lunas);

    
                $nilai_satuan = [];
                $barangs = $item->barangs()
                                    ->where('status_batal', '0')
                                    ->get();
                foreach ($barangs as $row) {
                    array_push($nilai_satuan, [
                        (int)$row->harga_satuan * $row->alt
                    ]);
                }
                $collapse = Arr::collapse($nilai_satuan);
    
                #Rumus Grandtotal (+pph2%) = total - diskon - pph 2% + ppn 10% + transport
    
                $total      = array_sum($collapse);
                $discount   = $finance->discount;
                $subtotal	= $total - $discount;
                $ppn		= $subtotal * 0.1;
                $pph		= $subtotal * 0.02;
                $tat        = $finance->tat;
    
                if (is_null($finance->pph)) {
                    $grand_total = $subtotal + $ppn + $tat;
                } else {
                    $grand_total = $subtotal - $pph + $ppn + $tat;
                }
        
                if (!is_null($finance->bayar)) {
                    $sisa_bayar = $grand_total - $total_pembayaran_lunas;
                    if($finance->sisa_bayar == 0) {
                        $status = 'sudah_bayar';
                    } else {
                        $status = $finance->status;
                    }
                } else {
                    $sisa_bayar = $grand_total;
                    $status = $finance->status;
                }
        
                try {
                    Finance::find($finance->id)
                            ->update([
                                'total_bayar' => $total,
                                'grand_total' => $grand_total,
                                'sisa_bayar'  => $sisa_bayar,
                                'status'      => $status
                            ]);
                    Dit::Log(1, 'Sukses recalculate order pada order '. $item->no_order, 'success');
                    /* toast('Recalculate order has been successfully.','success');
                    return redirect()->route('administrasi.show', $order_id); */
                } catch (\Throwable $th) {
                    \Log::error($th);
                    Dit::Log(0, 'Error recalculate order pada order '. $item->no_order, 'error');
                    /* toast('Recalculate order has been error.','error');
                    return redirect()->route('administrasi.show', $order_id); */
                    // throw $th;
                }
            }
            Dit::Log(1, 'Sukses recalculate semua order ', 'success');
            toast('Recalculate orders has been successfully.','success');
            return redirect()->route('tools-panel.index');
        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

    }

    public function lagChecking()
    {
        try {
            Dit::lagChecking();
            toast('Lag Checking has been successfully.','success');
            return redirect()->route('tools-panel.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
