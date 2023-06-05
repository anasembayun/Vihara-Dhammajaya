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
        Schema::create('data_baptisan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jamaat')->unique();
            $table->string('no_sertifikat');
            $table->string('name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('kelurahan_kecamatan');
            $table->string('kabupaten_kota');
            $table->string('rt_rw');
            $table->string('tempat_wisuda');
            $table->date('tanggal_wisuda');
            $table->string('nama_baptis');
            $table->string('arti_nama_baptis');
            $table->string('bhikhu_pemberi_wisuda');
            $table->string('pandita_pemimpin_upacara');
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
        Schema::dropIfExists('data_baptisan');
    }
};
