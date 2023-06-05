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
        Schema::create('data_leluhur', function (Blueprint $table) {
            $table->id();
            $table->string('id_pemesan');
            $table->string('nama_mendiang');
            $table->string('relasi');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_meninggal')->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->date('transaksi_terakhir');
            $table->date('periode_pemesanan')->nullable();
            // $table->string('periode'); //gk di pake
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_leluhur');
    }
};
