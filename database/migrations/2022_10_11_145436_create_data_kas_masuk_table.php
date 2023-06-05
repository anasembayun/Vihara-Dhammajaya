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
        Schema::create('data_kas_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kas_masuk')->unique();
            $table->bigInteger('id_admin');
            $table->string('nama_admin');
            $table->string('keterangan_keperluan');
            $table->string('tanggal');
            $table->decimal('nominal_pemasukan', 14, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kas_masuk');
    }
};
