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
        Schema::create('detail_transaksi_foto', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->bigInteger('id_leluhur');
            $table->bigInteger('total_periode');
            $table->date('bayar_bulan_terakhir')->nullable();
            $table->date('bayar_sampai_bulan');
            $table->decimal('total_harga', 14, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_foto');
    }
};
