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
use Illuminate\Database\Eloquent\Builder;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Finance;
use App\Models\HistoryPembayaran;
use App\Setting;
use Validator;
use DataTables;
use Dit;
use Arr;

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
        /* $order = Order::findOrFail($id);
        $roman =  Dit::Roman(date('m'));
        $no_kwitansi = Setting::where('key', 'no_kwitansi')->first();
        $no_invoice = Setting::where('key', 'no_invoice')->first();
        $no_kwitansi = 'G'.date('m').'-'.$no_kwitansi->value.'/KWI/'.$roman.'/'.date('y');
        $no_invoice = 'G'.date('m').'-'.$no_invoice->value.'/INV/'.$roman.'/'.date('y'); */
        // return view('admin.finance.show', compact('order', 'no_kwitansi', 'no_invoice'));

        $finance = Finance::where('order_id', $id)->first();
        if (!$finance) {
            abort(404);
        }
        $history_pembayaran = HistoryPembayaran::where('finance_id', $finance->id)->get();
        $order = Order::find($id);
        return view('admin.finance.show', compact('history_pembayaran', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $PPn   = $order->finance['total_bayar'] * 0.1;
        $total_bayar = Dit::GrandTotal($order->finance['id']);
        return view('admin.finance.edit', compact('order', 'total_bayar'));
    }

    public function editPembayaran($id)
    {
        $finance = Finance::findOrFail($id);
        $pembayaran = HistoryPembayaran::where('finance_id', $finance->id)->first();
        return view('admin.finance.edit-pembayaran', compact('finance', 'pembayaran'));
    }

    public function prosesEditPembayaran(Request $request, $id)
    {
        $finance = Finance::findOrFail($id);
        $order   = Order::findOrFail($finance->id);
        if ($finance) {
            $finance->update($request->all());
            Dit::Log(1,'Merubah data pembayaran pada order '.$order->no_order, 'Success');
            toast('Berhasil merubah data pembayaran.','success');
            return redirect()->route('finance.index');
        } else {
            Dit::Log(0,'Merubah data pembayaran pada order '.$order->no_order, 'Error');
            toast('Gagal merubah data pembayaran.','error');
            return redirect()->route('finance.editPembayaran', $finance->id);
        }
    }

    public function ProsesBayar(Request $request, $id)
    {
        $pembayaran = HistoryPembayaran::findOrFail($id);
        $finance    = Finance::findOrFail($pembayaran->finance_id);
        

        if ($request->tanggal_bayar) {
            
            // $pra_sisa_bayar = $finance->sisa_bayar - $finance->discount;
            // $ppn_sisa_bayar = $pra_sisa_bayar * 0.1;
            // $sisa_bayar = ($pra_sisa_bayar + $ppn_sisa_bayar + $finance->tat) - $request->jumlah_bayar;
            // $ppn        = $sisa_bayar * 0.1;
            // $sisa_bayar = $sisa_bayar - $ppn;

            /* if (isset($finance->discount) OR isset($finance->tat)) {
                $bayar = $finance->sisa_bayar - $finance->discount;
                $sisa_bayar = $bayar - $request->jumlah_bayar;
            } else {

            } */

            if ($request->jumlah_bayar > ($finance->sisa_bayar * 0.1) + $finance->sisa_bayar) {
                return response()->json([
                    'status' => false,
                    'msg'    => 'Gagal, Jumlah bayar melebihi sisa bayar'
                ]);
            }

            $sisa_bayar = $finance->sisa_bayar - $request->jumlah_bayar;
            // $ppn_sisa_bayar = $sisa_bayar * 0.1;
            // $total = $sisa_bayar + $ppn_sisa_bayar + $finance->tat;

            // return $total;


            // $ppn_sisa_bayar = $finance->sisa_bayar * 0.1;
            // $sisa_bayar = ($finance->sisa_bayar + $ppn_sisa_bayar) - $request->jumlah_bayar;

            if ($sisa_bayar == 0) {
                $status = 'sudah_bayar';
            } else {
                $status = 'tagih';
            }
            
            $finance->update(['sisa_bayar' => $sisa_bayar, 'status' => $status]);


            $request->merge(['status' => 'Lunas']);
            $pembayaran->update($request->all());
        } else {
            $pembayaran->update($request->all());
        }

        if ( $pembayaran->status == 'Lunas' ) {
            $status = true;
            $msg    = $pembayaran->no_invoice.' Berhasil Dibayarkan';
        } else {
            $status = true;
            $msg    = 'Data Finance Berhasil di Simpan';
        }

        
        return response()->json([
            'status' => $status,
            'msg'    => $msg
        ]);
            
        
        
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
        $financeSubtotal = $finance->sisa_bayar - $finance->discount;
        $financePpn      = $financeSubtotal * 0.1;
        $financeTotal    = $financeSubtotal + $financePpn + $finance->tat;
        // return $financeTotal;
        if($finance->sisa_bayar == 0) {
            toast('Gagal, Pembayaran sudah lunas','error');
            return back();
        } elseif ($request->bayar > $financeTotal ) {
            toast('Gagal, Jumlah bayar melebihi sisa bayar','error');
            return back();
        }
        $roman =  Dit::Roman(date('m'));
        
        if (!HistoryPembayaran::first()) {
            $no_kwitansi = Setting::where('key', 'no_kwitansi')->first();
            $no_invoice  = Setting::where('key', 'no_invoice')->first();
            
            $no_kwitansi = 'G'.date('m').'-'.$no_kwitansi->value.'/KWI/'.$roman.'/'.date('y');
            $no_invoice = 'G'.date('m').'-'.$no_invoice->value.'/INV/'.$roman.'/'.date('y');
        } else {
            $history_pembayaran = HistoryPembayaran::where('finance_id', $id)->get();

            $data_finance = HistoryPembayaran::where('finance_id', $id)->first();
            $last_number  = HistoryPembayaran::latest()->first();

            

            if (count($history_pembayaran) < 1) {

                //new invoce number
                $slice_invoice = explode('/', $last_number->no_invoice);
                $new_no_invoice = substr($slice_invoice[0], 4) + 1;
                $no_invoice  = 'G'.date('m').'-'.$new_no_invoice.'/INV/'.$roman.'/'.date('y');

                //new kwitansi number
                $slice_kwitansi = explode('/', $last_number->no_kwitansi);
                $new_no_kwitansi = substr($slice_kwitansi[0], 4) + 1;
                $no_kwitansi  = 'G'.date('m').'-'.$new_no_kwitansi.'/KWI/'.$roman.'/'.date('y');
            } else {
                $part_number = count($history_pembayaran) + 1;
                $no_invoice = $data_finance->no_invoice.'-['.$part_number.']';
                $no_kwitansi= $data_finance->no_kwitansi.'-['.$part_number.']';
            }
        }

        HistoryPembayaran::create([
            'finance_id'        => $id,
            'jumlah_bayar'      => $request->bayar == NULL ? 0 : $request->bayar,
            'tanggal_tagihan'   => $request->tgl_tagihan,
            'tanggal_bayar'     => $request->bayar == NULL ? NULL : $request->tgl_bayar,
            'no_invoice'        => $no_invoice,
            'no_kwitansi'       => $no_kwitansi,
            'status'            => 'Belum Lunas', #$request->bayar == NULL ? 'Belum Lunas' : 'Lunas',
            'keterangan'        => $request->keterangan
        ]);

        /* if ($request->bayar) {
            $jumlah_bayar = [];
            $pembayaran = HistoryPembayaran::where('finance_id', $id)->get();
            foreach($pembayaran as $item) {
                array_push($jumlah_bayar, [
                    (int)$item->jumlah_bayar
                ]);
            }
            $collapse = Arr::collapse($jumlah_bayar);
            $sum = array_sum($collapse);
            $total_bayar = $sum;
            $sisa_bayar  = Dit::GrandTotal($finance->id) - $total_bayar;
            $request->merge(['sisa_bayar' => $sisa_bayar]);
        } */

        $order   = Order::findOrFail($finance->order_id);

        $finance->update(['status' => 'siap_tagih']);
        $finance->update($request->except('keterangan'));
        if ($finance->sisa_bayar == 0) {
            $finance->update(['status' => 'sudah_bayar']);
        }

        if ($finance) {
            Dit::Log(1,'Merubah data finance pada order '.$order->no_order, 'Success');
            toast('Finance edit successfully.','success');
            return redirect()->route('finance.index');
        } else {
            Dit::Log(0,'Merubah data finance pada order '.$order->no_order, 'Error');
            toast('Finance edit failed.','error');
            return redirect()->route('finance.show', $id);
        }
    }

    public function cancelHistory($id) 
    {
        $data = HistoryPembayaran::find($id);
        if ($data->status === 'Belum Lunas') {
            $data->update(['status' => 'Batal']);
            return redirect()->route('finance.show', $data->finance_id);
        } else {
            return back();
            toast('Status pembayaran ' . $data->status,'error');
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
        $data = Order::with('customer', 'finance')
                        ->orderBy('created_at', 'DESC')
                        ->whereHas('finance', function(Builder $query) {
                            $query->where('status', '!=' , 'sudah_bayar');
                        })
                        ->get();

        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('no_order', function($item) {
                    $result = ucfirst($item->no_order). '<br>';
                    $result .= '<a href='.route('finance.edit', $item->id).'>Cetak Invoice</a> <a href='.route('finance.show', $item->id).'>Pembayaran</a>';
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
                    $total_bayar = Dit::GrandTotal($item->finance['id']);
                    $total_bayar = Dit::Rupiah($total_bayar);
                    $edit = '<br> <a href="'.route('finance.editPembayaran', $item->finance['id']).'">Edit Pembayaran</a>';

                    return $total_bayar.$edit;
                })
                ->addColumn('sisa_bayar', function($item) {
                    if ($item->finance['sisa_bayar'] == NULL) {
                        $sisa_bayar = 0;
                    } else {
                        $pembayaran = HistoryPembayaran::where('finance_id', $item->finance['id'])
                                                        ->where('status', 'Lunas')
                                                        ->get();
                        // if (count($pembayaran) >= 1) {
                        //     $sisa_bayar = $item->finance['sisa_bayar'] * 0.1;
                        //     $sisa_bayar = $item->finance['sisa_bayar'] + $sisa_bayar;   
                        // } else {
                            $pra_sisa_bayar = $item->finance['sisa_bayar'] - $item->finance['discount'];
                            $ppn_sisa_bayar = $pra_sisa_bayar * 0.1;
                            $sisa_bayar = $pra_sisa_bayar + $ppn_sisa_bayar + $item->finance['tat'];
                        // }
                    }
                    return Dit::Rupiah($sisa_bayar);
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
    }
}
