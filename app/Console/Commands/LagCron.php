<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use \App\Models\Barang;
use \App\Models\Order;
use \App\Models\KartuAlat;
use DateTime;

class LagCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:lag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $orders = Order::orderBy('created_at', 'ASC')
                        ->get();
        foreach($orders as $order) {
            foreach($order->barangs as $item) {
                $barang = Barang::whereId($item->id)
                                ->where('status_batal', '0')
                                ->first();
                $kartu_alat = KartuAlat::where('barang_id', $barang->id)
                                        ->first();
                if ($kartu_alat->paraf_administrasi === NULL) {

                    if ($barang->status_alat === 'alat_datang') {

                        if ($barang->AS !== 'A-S') {
                            
                            $hari_kerja = $order->hari_kerja;

                            // $tgl_barang = strtotime($barang->created_at);
                            // $tgl_barang = strtotime("+". $hari_kerja ." day", $tgl_barang);
                            // $tgl_barang = date('Y-m-d h:i:s', $tgl_barang);
        
                            // $tanggal1 = new \DateTime($tgl_barang);
                            // $tanggal2 = new \DateTime();
        
                            // $perbedaan = $tanggal1->diff($tanggal2)->format("%a");

                            $tgl1 = date('Y-m-d');
                            $tgl2 = strtotime($barang->created_at);
                            if (strtotime($tgl1) >= $tgl2) {
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($barang->created_at)));
                                $to = $to->addDays($hari_kerja);
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                $diff_in_days = $to->diffInDays($from);

                                if ($diff_in_days == 0) {
                                    $diff_in_days = NULL;
                                }
                                $barang->update([
                                    'LAG' => $diff_in_days
                                ]);
                                
                                \Log::info($barang->nama_barang . " status lag was update");
                            }
        
                            // if ($perbedaan == 0) {
                            //     $perbedaan = NULL;
                            // }
                            // $barang->update([
                            //     'LAG' => $perbedaan
                            // ]);
                            
                            // \Log::info($barang->nama_barang . " status lag was update");


                            // $from = \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', '2020-11-08 3:30:34');
                            
                            // $to = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($barang->created_at)));
                            // $to = $to->addDays($hari_kerja);
                            // $from = \Carbon\Carbon::createFromFormat('Y-m-d', '2020-11-08');
                            // $diff_in_days = $to->diffInDays($from);
                            // \Log::info('from '.$from . ' | to ' . $to . ' diff '. $diff_in_days);

                        }
                        
                    } else if ($barang->status_alat === 'belum_datang') {

                        $barang->update([
                            'LAG' => NULL
                        ]);

                    }

                }

            }
        }
    }
}
