<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_alats', function (Blueprint $table) {
            $table->id();
            $table->integer('barang_id')->nullable();
            $table->string('paraf_alat')->nullable();
            $table->string('tgl_alat')->nullable();
            $table->string('paraf_selesai')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->string('paraf_sertifikat')->nullable();
            $table->string('tgl_sertifikat')->nullable();
            $table->string('paraf_administrasi')->nullable();
            $table->string('tgl_administrasi')->nullable();
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
        Schema::dropIfExists('kartu_alats');
    }
}
