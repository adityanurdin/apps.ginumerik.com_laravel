<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Setting;
use Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no_order = Setting::where('key', 'no_order')->first();
        $secret_code = Setting::where('key', 'secret_code')->first();
        $no_invoice = Setting::where('key', 'no_invoice')->first();
        $no_kwitansi = Setting::where('key', 'no_kwitansi')->first();
        return view('admin.settings.index', compact('no_order', 'secret_code', 'no_invoice', 'no_kwitansi'));
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
            'secret_code'     => 'required|max:6|min:6',
        ])->validate();
        // return $request->all();
        if (Self::cek_setting('no_order')) {
            Setting::where('key', 'no_order')->update([
                'value' => $request->no_order
            ]);
        } else {
            Setting::create([
                'key'   => 'no_order',
                'value' => $request->no_order
            ]);
        }
        
        if (Self::cek_setting('no_invoice')) {
            Setting::where('key', 'no_invoice')->update([
                'value' => $request->no_invoice
            ]);
        } else {
            Setting::create([
                'key'   => 'no_invoice',
                'value' => $request->no_invoice
            ]);
        }
        if (Self::cek_setting('no_kwitansi')) {
            Setting::where('key', 'no_kwitansi')->update([
                'value' => $request->no_kwitansi
            ]);
        } else {
            Setting::create([
                'key'   => 'no_kwitansi',
                'value' => $request->no_kwitansi
            ]);
        }
        if (Self::cek_setting('secret_code')) {
            Setting::where('key', 'secret_code')->update([
                'value' => $request->secret_code
            ]);
        } else {
            Setting::create([
                'key'   => 'secret_code',
                'value' => $request->secret_code
            ]);
        }

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
