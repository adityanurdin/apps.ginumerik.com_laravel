<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Models\Barang;
use Dit;

class SertifikatController extends Controller
{
    
    public function index()
    {
        return view('admin.teknis.sertifikat.index');
    }

    public function show($id)
    {
        $no_sert = Dit::decode($id);
        $barang  = Barang::where('no_sertifikat', $no_sert)->first();
        if (!$barang) {
            abort(404);
        }
        return view('admin.teknis.sertifikat.show', compact('barang'));
    }

}
