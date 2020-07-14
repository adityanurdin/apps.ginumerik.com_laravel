<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLabField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->string('LAG')->after('harga_satuan')->nullable();
            $table->string('AS')->after('harga_satuan')->nullable();
            $table->string('sub_lab')->after('harga_satuan')->nullable();
            $table->string('lab')->after('harga_satuan')->nullable();
            $table->string('no_sertifikat')->after('harga_satuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            //
        });
    }
}
