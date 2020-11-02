<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Dit;
use PDF;
use Arr;
use \App\Models\Order;
use \App\Models\Barang;

class SystemReportController extends Controller
{
    

    public function index() 
    {
        return view('admin.system-report.index');
    }

    public function export(Request $request) 
    {
        
        if (!$request->kategori) {
            abort(404);
        }

        switch ($request->kategori) {
            case 'order':
                $query  = '
                    SELECT 
                    COUNT(*) AS jumlah_order, MONTH(orders.created_at) AS bulan
                    FROM orders
                    WHERE YEAR(orders.created_at) = '.date('Y').'
                    GROUP BY MONTH(orders.created_at);
                ';
                $result = \DB::select(\DB::raw($query));
                $title  = 'Export Data - Jumlah order per bulan dalam satu tahun';
                return $result;

                $pdf    = Pdf::loadView('pdf.system-report', compact('result', 'title', 'request'));
                return $pdf->download($title.' ('.date('Y').').pdf');
                break;
            case 'sertifikat':
                $query_sert_tahun = '
                    SELECT
                    COUNT(*) AS jumlah, MONTH(barangs.created_at) AS bulan
                    FROM barangs
                    WHERE YEAR(barangs.created_at) = "'.date('Y').'" AND NOT barangs.sub_lab = "-"
                    GROUP BY bulan;
                ';
                $query_sert_sub_lab = '
                    SELECT
                    COUNT(*) AS jumlah, barangs.sub_lab AS sublab
                    FROM barangs
                    WHERE YEAR(barangs.created_at) = "'.date('Y').'" AND NOT barangs.sub_lab = "-"
                    GROUP BY sublab;
                ';
                $query_sert_kan = '
                    SELECT
                    COUNT(*) AS jumlah, barangs.KAN AS kan
                    FROM barangs
                    WHERE YEAR(barangs.created_at) = "'.date('Y').'" AND NOT barangs.sub_lab = "-"
                    GROUP BY kan;
                ';

                $result_sert_sub_lab = \DB::select(\DB::raw($query_sert_sub_lab));
                $result_sert_kan = \DB::select(\DB::raw($query_sert_kan));
                $result_sert_tahun = \DB::select(\DB::raw($query_sert_tahun));
                $result_sert_subkon = Barang::select('*', \DB::raw('COUNT(*) as jumlah, barangs.lab AS lab'))
                                            ->where('lab', 'sub_con')
                                            ->whereYear('created_at', date('Y'))
                                            ->first();
                // return $result_sert_subkon->jumlah;
                $title  = 'Export Data - Jumlah sertifikat per bulan dalam satu tahun';
                $pdf    = Pdf::loadView('pdf.system-report', compact('result_sert_sub_lab', 'result_sert_kan', 'result_sert_tahun','result_sert_subkon', 'title', 'request'));
                return $pdf->download($title.' ('.date('Y').').pdf');
                break;
            case 'alat':
                $query = '
                    SELECT
                    COUNT(*) AS jumlah, barangs.sub_lab AS bidang
                    FROM barangs
                    WHERE YEAR(barangs.created_at) = "'.date('Y').'"  AND NOT barangs.sub_lab = "-"
                    GROUP BY bidang;
                ';
                $result = \DB::select(\DB::raw($query));
                $title  = 'Export Data - Jumlah alat masuk per bidang/lab';

                $pdf    = Pdf::loadView('pdf.system-report', compact('result', 'title', 'request'));
                return $pdf->download($title.' ('.date('Y').').pdf');
                break;
            case 'alat_lag':
                $query = '
                    SELECT
                    COUNT(*) AS jumlah, MONTH(barangs.created_at) AS bulan
                    FROM barangs
                    WHERE barangs.LAG >= 1 AND YEAR(barangs.created_at) = "'.date('Y').'"
                    GROUP BY bulan
                ';
                $result = \DB::select(\DB::raw($query));
                $title  = 'Export Data - Jumlah alat yang lag per bulan dalam satu tahun';

                $pdf    = Pdf::loadView('pdf.system-report', compact('result', 'title', 'request'));
                return $pdf->download($title.' ('.date('Y').').pdf');
                break;
            case 'top_cust':
                $result = Order::select('*', \DB::raw('SUM(grand_total) as total_sales'))
                ->join('finances', 'orders.id', '=', 'finances.order_id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('status', 'sudah_bayar')
                ->whereYear('orders.created_at', '=', date('Y'))
                ->groupBy('orders.customer_id')
                ->orderBy('grand_total', 'DESC')
                ->limit(5)
                ->get();
                $title  = 'Export Data - Top 5 customer berdasarkan nilai PO terbesar';

                $pdf    = Pdf::loadView('pdf.system-report', compact('result', 'title', 'request'));
                return $pdf->download($title.' ('.date('Y').').pdf');
                break;
            default:
                abort(404);
                break;
        }
    }
    
}
