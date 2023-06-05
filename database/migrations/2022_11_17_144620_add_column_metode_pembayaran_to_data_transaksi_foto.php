<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_transaksi_foto', function (Blueprint $table) {
            $table->string('metode_pembayaran')->after('kode_transaksi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_transaksi_foto', function (Blueprint $table) {
            $table->dropColumn('metode_pembayaran');
        });
    }
};
