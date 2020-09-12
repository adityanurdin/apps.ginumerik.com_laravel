<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('finance_id');
            $table->string('jumlah_bayar')->nullable();
            $table->string('tanggal_bayar')->nullable();
            $table->string('tanggal_tagihan');
            $table->string('no_invoice');
            $table->string('no_kwitansi');
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_pembayarans');
    }
}
