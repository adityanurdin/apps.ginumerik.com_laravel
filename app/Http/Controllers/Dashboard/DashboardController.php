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

use App\User;
use App\Models\Barang;
use App\Models\Order;
use App\Models\Finance;
use App\Log;
use Carbon\Carbon;

use Auth;

class DashboardController extends Controller
{


    public static function financeStatus($value)
    {
        $finance = finance::where('status', $value);
        return $finance;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $logs   = Log::with('user')->orderBy('created_at', 'DESC')->limit(5)->get();

        /* $query  = '
        select 
        count(*) AS jumlah_order, customers.nama_perusahaan AS nama_perusahaan
        from orders
        inner join customers on orders.customer_id = customers.id where year(orders.created_at) = '.date('Y').' group by orders.customer_id
        ORDER BY jumlah_order DESC
        LIMIT 10;
         ';
        $rank = \DB::select(\DB::raw($query)); */

        $rank = Order::select('*', \DB::raw('SUM(grand_total) as total_sales'))
                ->join('finances', 'orders.id', '=', 'finances.order_id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('status', 'sudah_bayar')
                ->whereYear('orders.created_at', '=', date('Y'))
                ->groupBy('orders.customer_id')
                ->orderBy('total_sales', 'DESC')
                ->limit(10)
                ->get();

        Carbon::setWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        $lag = Barang::with('orders')
                        ->where('AS', '!=', 'A-S')
                        ->where('LAG', '>=', 1)
                        ->limit(5)
                        ->orderBy('LAG', 'DESC')
                        ->get();
        // return $lag;

        $data = array(
            'logs'      => $logs,
            'rank'      => $rank,
            'lag'       => $lag,
            'users'     => User::all(),
            'orders'    => Order::all(),
            'alat'      => Barang::where('status_alat', 'alat_datang')->get(),

            
            'dalam_proses'  => self::financeStatus('dalam_proses')->get(),
            'siap_tagih'    => self::financeStatus('siap_tagih')->get(),
            'tagih'         => self::financeStatus('tagih')->get(),
            'sudah_bayar'   => self::financeStatus('sudah_bayar')->get(),

            
            'sudah_bayar_minggu'    => self::financeStatus('sudah_bayar')
                                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            'siap_tagih_minggu'     => self::financeStatus('siap_tagih')
                                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            'tagih_minggu'          => self::financeStatus('tagih')
                                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            'all_minggu'            => Finance::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            
            
            'today_order'       => Order::with('customer')
                                    ->whereDay('created_at',date('d'))
                                    ->orderBy('created_at', 'DESC')
                                    ->get(),
            'monthly_order'     => Order::with('customer')
                                    ->whereMonth('created_at',date('m'))
                                    ->get(),
            'yearly_order'      => Order::with('customer')
                                    ->whereYear('created_at',date('Y'))
                                    ->get(),
            
            'FIN'   => [
                'siap_tagih'    => Order::with('finance')
                                ->whereHas('finance', function(Builder $query) {
                                    $query->where('status', '!=' , 'sudah_bayar');
                                    $query->where('status', '!=' , 'dalam_proses');
                                    $query->where('status', '!=' , 'sudah_bayar');
                                })
                                ->get(),
            ]
        );

        return view('admin.dashboard.index', compact('data'));
    }

    public function account()
    {
        $user   = Auth::user();
        $barang = Barang::where('user_id', $user->id)->get();

        return view('auth.account', compact('user', 'barang'));
    }

    public function updateAccount(Request $request)
    {
        if ($request->password != NULL) {
            $validation = \Validator::make($request->all(), [
                'name'          => 'string',
                'password'      => 'confirmed',
            ])->validate();
        }

        $user   = Auth::user();
        $users  = User::find($user->id);

        if (\Hash::check($request->old_password, $users->password)) {
            if ($request->password != NULL) {
                $request->merge(['password' => \Hash::make($request->password)]);
                $users->update($request->except(['password_confirmation', 'old_password']));
            } else {
                $users->update($request->only(['name']));
            }

            toast('Berhasil memperbaharui profil','success');
            return redirect()->route('account-info');
        } else {
            toast('Gagal memperberharui profil','error');
            return redirect()->route('account-info');
        }
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
