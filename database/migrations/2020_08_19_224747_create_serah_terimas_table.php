<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerahTerimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serah_terimas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_upk_penerima')->nullable();
            $table->integer('id_upk_penyerah')->nullable();
            $table->integer('id_lab_penerima')->nullable();
            $table->integer('id_lab_penyerah')->nullable();
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
        Schema::dropIfExists('serah_terimas');
    }
}
