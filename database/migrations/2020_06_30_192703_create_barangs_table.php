<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            // $table->integer('order_id');
            // $table->string('no_PO')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('merk')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('alt')->nullable();
            $table->string('st')->nullable();
            $table->string('harga_satuan')->nullable();
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
        Schema::dropIfExists('barangs');
    }
}
