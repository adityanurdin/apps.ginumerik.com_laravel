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
                if ($kartu_alat->paraf_administrasi !== NULL) {

                    if ($barang->status_alat === 'alat_datang') {
                        
                        $hari_kerja = $order->hari_kerja;
                        $tgl_barang = strtotime($barang->created_at);
                        $tgl_barang = strtotime("+". $hari_kerja ." day", $tgl_barang);
                        $tgl_barang = date('Y-m-d', $tgl_barang);
    
                        $tanggal1 = new \DateTime($tgl_barang);
                        $tanggal2 = new \DateTime();
    
                        $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
    
                        if ($perbedaan == 0) {
                            $perbedaan = NULL;
                        }
                        $barang->update([
                            'LAG' => $perbedaan
                        ]);
                        
                        \Log::info($barang->nama_barang . " status lag was update");
                        
                    } else if ($barang->status_alat === 'belum_datang') {

                        $barang->update([
                            'LAG' => NULL
                        ]);
                        \Log::info($barang->nama_barang . " belum datang");

                    }

                } else {

                    \Log::info($barang->nama_barang . " belum selesai dikerjakan");

                }

            }
        }
        // \Log::info("Updating status lag successfully");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}
