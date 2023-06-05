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
        Schema::create('data_pernikahan', function (Blueprint $table) {
            $table->id();
            $table->string('no_sertifikat');
            $table->date('tanggal_pernikahan');
            $table->string('tempat_pernikahan');
            $table->string('rt_rw');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('p_nama');
            $table->string('p_ayah');
            $table->string('p_ibu');
            $table->string('p_tempat_lahir');
            $table->date('p_tanggal_lahir');
            $table->string('p_alamat');
            $table->string('p_rt_rw');
            $table->string('p_kelurahan');
            $table->string('p_kecamatan');
            $table->string('p_kabupaten_kota');
            $table->string('w_nama');
            $table->string('w_ayah');
            $table->string('w_ibu');
            $table->string('w_tempat_lahir');
            $table->date('w_tanggal_lahir');
            $table->string('w_alamat');
            $table->string('w_rt_rw');
            $table->string('w_kelurahan');
            $table->string('w_kecamatan');
            $table->string('w_kabupaten_kota');
            $table->string('pandita');
            $table->string('saksi_1');
            $table->string('saksi_2');
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
        Schema::dropIfExists('data_pernikahan');
    }
};
