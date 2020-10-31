<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTatDiscountToHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_pembayarans', function (Blueprint $table) {
            $table->string('tat')->nullable()->after('no_pajak');
            $table->string('discount')->nullable()->after('no_pajak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_pembayarans', function (Blueprint $table) {
            //
        });
    }
}
