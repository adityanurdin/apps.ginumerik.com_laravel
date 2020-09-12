<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use \App\Models\Barang;
use \App\Models\Order;
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
        /* $barangs = Barang::get();
        foreach ($barangs as $item) {
            $barang =  Barang::find($item->id);
            
            $tgl_barang = date('Y-m-d', strtotime($barang->created_at));
            $tanggal1 = new \DateTime($tgl_barang);
            $tanggal2 = new \DateTime();
            
            $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
            if ($perbedaan == 0) {
                $perbedaan = '?';
            }

            $barang->update([
                'LAG' => $perbedaan
            ]);
        } */

        $orders = Order::all();
        foreach ($orders as $order) {
            foreach ($order->barangs as $barang) {
                $barang =  Barang::find($barang->id);
            
                $tgl_barang = strtotime($barang->created_at);
                $tgl_barang = strtotime("+".$order->hari_kerja." day", $tgl_barang);
                $tgl_barang = date('Y-m-d', $tgl_barang);

                // $tgl_barang = date('Y-m-d', strtotime($barang->created_at));
                $tanggal1 = new \DateTime($tgl_barang);
                $tanggal2 = new \DateTime();
                
                $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
                if ($perbedaan == 0) {
                    $perbedaan = '?';
                }
    
                $barang->update([
                    'LAG' => $perbedaan
                ]);
            }
        }
        \Log::info("Updating status lag successfully");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}
