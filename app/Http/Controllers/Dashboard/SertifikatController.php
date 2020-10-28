<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Models\Order;
use \App\Models\Barang;
use \App\Models\Sertifikat;
use Dit;
use Str;
use Validator;
use Carbon\Carbon;
use Storage;

class SertifikatController extends Controller
{
    
    public function index()
    {
        $data = Barang::with('orders')
                ->where('AS', '!=', NULL)
                ->get();
        return view('admin.teknis.sertifikat.index', compact('data'));
    }

    public function show($id, $order_id)
    {
        $no_sert = Dit::decode($id);
        $barang  = Barang::where('no_sertifikat', $no_sert)->first();
        $sertifikat = Sertifikat::where('barang_id', $barang->id)->get();
        if (!$barang) {
            abort(404);
        }
        return view('admin.teknis.sertifikat.show', compact('barang', 'sertifikat', 'order_id'));
    }

    public function upload(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf|max:5120',
        ]);

        $barang  = Barang::findOrFail($request->barang_id);

        if ($validasi->fails()) {
            toast('Gagal mengunggah file'. $validasi->errors(),'error');
            return redirect()->route('sertifikat.show', [Dit::encode($barang->no_sertifikat), $request->order_id]);
        }

        // Path
        $path     = 'Sertifikat';
        $path     = $path . '/'. date('Y') . '/' . date('F') . '/';
        // File
        $file     = $request->file('file');
        $fileName = Carbon::now()->timestamp;
        // Check Disk
        while (Storage::disk('public')->exists($path . $fileName . $file->getClientOriginalExtension())) {
            $fileName = Carbon::now()->timestamp;
        }

        $full_path = $path . $fileName;

        $store = Storage::disk('public')->put($full_path, $file, 'public');
        
        $sert = Sertifikat::create([
            'barang_id' => $request->barang_id,
            'nama_file' => $request->nama_file,
            'file'      => $store,
            'tipe_file' => '.'.$request->file->extension()
        ]);

        if ($sert) {
            $link = route('sertifikat.download', Dit::encode($store));
            $order = Order::findOrFail($request->order_id);
            Dit::Log(1, 'Mengunggah file <a href="'.$link.'">'.$request->nama_file.'</a> alat '.$barang->nama_barang.' pada order '.$order->no_order, 'success');

            toast('Berhasil mengunggah file','success');
            return redirect()->route('sertifikat.show', [Dit::encode($barang->no_sertifikat), $request->order_id]);
        }
  
    }

    public function download($id)
    {
        $link = \Storage::disk('public')->url(\Dit::decode($id));
        return redirect($link);
    }

}
