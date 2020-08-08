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

use App\User;
use App\Models\Barang;
use App\Models\Order;
use App\Models\Finance;
use Carbon\Carbon;

use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'TEK') {
            $today_order = Order::where('created_at', Carbon::today())->count();
            $kan         = Barang::where('KAN', 'KAN')->count('KAN');
            $non_kan         = Barang::where('KAN', 'NON KAN')->count('KAN');
        } else if ($user->role == 'FIN') {
            $tagihan     = Finance::where('status', NULL)
                                    ->orWhere('status', 'Belum Bayar')
                                    ->orWhere('status', 'Belum Lunas')
                                    ->count();
            $belum_bayar = Finance::where('status', NULL)
                                    ->orWhere('status', 'Belum Bayar')
                                    ->count();
            $belum_lunas = Finance::where('status', 'Belum Lunas')
                                    ->count();
            $sudah_bayar = Finance::where('status', 'Sudah Bayar')
                                    ->count();
            
        }

        $data = array(
            'TEK' => [
                'today_order' => isset($today_order) ? $today_order : '',
                'kan'         => isset($kan) ? $kan : '',
                'non_kan'     => isset($non_kan) ? $non_kan : ''
            ],
            'FIN' => [
                'tagihan'     => isset($tagihan) ? $tagihan : '',
                'belum_bayar'     => isset($belum_bayar) ? $belum_bayar : '',
                'belum_lunas'     => isset($belum_lunas) ? $belum_lunas : '',
                'sudah_bayar'     => isset($sudah_bayar) ? $sudah_bayar : '',

            ]
        );

        return view('admin.dashboard.index', compact('data'));
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
}
