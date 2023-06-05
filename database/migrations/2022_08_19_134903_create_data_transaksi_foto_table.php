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
        Schema::create('data_transaksi_foto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemesan');
            $table->bigInteger('id_admin');
            $table->string('alamat_pemesan');
            $table->string('kode_transaksi')->unique();
            $table->timestamp('tanggal_transaksi');
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
        Schema::dropIfExists('data_transaksi_foto');
    }
};
