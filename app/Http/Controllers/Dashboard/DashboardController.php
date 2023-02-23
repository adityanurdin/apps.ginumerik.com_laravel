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
use App\Models\Customer;
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
                        ->where('AS', 'A-S')
                        ->where('LAG', '!=', NULL)
                        ->limit(5)
                        ->orderBy('LAG', 'DESC')
                        ->get();

        $lag_count = Barang::with('orders')
                        ->where('AS', NULL)
                        ->where('LAG', '!=', NULL)
                        ->orderBy('LAG', 'DESC')
                        ->count();
        // return $lag

        $quick_access = array();
        $quick_access_array = Order::with('finance')
                        ->whereHas('finance', function(Builder $query) {
                            $query->where('status', '!=', 'sudah_bayar');
                        })
                        ->get();
        foreach($quick_access_array as $item) {
            if ($item->finance['status'] == 'dalam_proses') {
                $badge = 'secondary';
            } else if ($item->finance['status'] == 'siap_tagih') {
                $badge = 'info';
            } else if ($item->finance['status'] == 'tagih') {
                $badge = 'success';
            } else {
                $badge = 'danger';
            }
            array_push($quick_access, [
                $item,
                'badge' => $badge
            ]);
        }
        // return $quick_access;

        $data = array(
            'logs'      => $logs,
            'rank'      => $rank,
            'lag'       => $lag,
            'lag_count'       => $lag_count,
            'users'     => User::whereYear('created_at', date('Y'))->get(),
            'customer'  => Customer::whereYear('created_at', date('Y'))->get(),
            'orders'    => Order::whereYear('created_at', date('Y'))->get(),
            'alat'      => Barang::where('status_alat', 'alat_datang')->whereYear('created_at', date('Y'))->get(),
            'alat_batal'=> Barang::where('status_batal', '1')->whereYear('created_at', date('Y'))->get(),
            
            'dalam_proses'  => self::financeStatus('dalam_proses')->whereYear('created_at', date('Y'))->get(),
            'siap_tagih'    => self::financeStatus('siap_tagih')->whereYear('created_at', date('Y'))->get(),
            'tagih'         => self::financeStatus('tagih')->whereYear('created_at', date('Y'))->get(),
            'sudah_bayar'   => self::financeStatus('sudah_bayar')->whereYear('created_at', date('Y'))->get(),

            
            'sudah_bayar_minggu'    => self::financeStatus('sudah_bayar')
                                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            'siap_tagih_minggu'     => self::financeStatus('siap_tagih')
                                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            'tagih_minggu'          => self::financeStatus('tagih')
                                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            'all_minggu'            => Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                            ->get(),
            
            
            'today_order'       => Order::with('customer')
                                    ->where('tgl_masuk', date('Y-m-d'))
                                    ->get(),
            // 'monthly_order'     => Order::whereMonth('created_at',date('m'))
            'monthly_order'     => Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                                    ->get(),
            // 'yearly_order'      => Order::whereYear('created_at',date('Y'))
            'yearly_order'      => Order::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
                                    ->get(),
            
            'FIN'   => [
                'quick_access'    => $quick_access,
            ]
        );
        // return date('d-m-Y');

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

    public function statistic($param)
    {
        if (is_null($param)) {
            return redirect()->route('dashboard.index');
        }

        switch ($param) {
            case 'mingguan':
                $statistic = Finance::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
                break;
            case 'bulanan':
                // $statistic = Finance::whereMonth('created_at', date('m'))->get();
                $statistic = Finance::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
                break;
            case 'tahunan':
                $statistic = Finance::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
                // $statistic = Finance::whereYear('created_at', date('Y'))->get();
                break;
            default:
                return redirect()->route('dashboard.index');
                break;
        }
        $orders_id = [];
        foreach ($statistic as $item) {
            array_push($orders_id, [
                $item->order_id
            ]);
        }
        $orders_id  = \Arr::collapse($orders_id);
        $orders     = Order::with('finance')->whereIn('id', $orders_id)->get();
        $finances   = [];
        foreach ($orders as $row) {
            array_push($finances, [
                (int)$row->finance['grand_total']
            ]);
        }
        $finances   = \Arr::collapse($finances);
        // return $finances;
        $sum        = array_sum($finances);

        // $sum = $orders->sum('total_bayar') + $orders->sum('tat');

        return view('admin.dashboard.statistic', compact('statistic', 'param', 'sum', 'orders'));
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
