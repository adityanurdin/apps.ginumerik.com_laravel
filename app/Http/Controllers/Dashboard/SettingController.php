<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Setting;
use Validator;
use Dit;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no_order = Dit::Setting('no_order');
        $secret_code = Dit::Setting('secret_code');
        $no_invoice = Dit::Setting('no_invoice');
        $no_kwitansi = Dit::Setting('no_kwitansi');
        $no_sertifikat = Dit::Setting('no_sertifikat');
        
        $data = array(
            'no_order'      => $no_order,
            'secret_code'   => $secret_code,
            'no_invoice'    => $no_invoice,
            'no_kwitansi'   => $no_kwitansi,
            'no_sertifikat' => $no_sertifikat
        );
        return view('admin.settings.index', compact('data'));
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

    static function cek_setting($value)
    {
        return Setting::where('key', $value)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'no_order'        => 'required',
            'no_sertifikat'        => 'required',
            'secret_code'     => 'required|max:6|min:6',
        ])->validate();

        // return $request->all();
        Dit::setSetting($request, 'no_order');
        Dit::setSetting($request, 'no_sertifikat');
        Dit::setSetting($request, 'no_invoice');
        Dit::setSetting($request, 'no_kwitansi');
        Dit::setSetting($request, 'secret_code');

        return redirect()->route('settings.index');
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
}
