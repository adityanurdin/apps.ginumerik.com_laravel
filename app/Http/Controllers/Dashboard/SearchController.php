<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Barang;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        try {
            $barang = Barang::with('orders')->where('nama_barang', 'like' , '%'.$request->q.'%')->get();

            return view('admin.dashboard.search', compact('barang', 'request'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
