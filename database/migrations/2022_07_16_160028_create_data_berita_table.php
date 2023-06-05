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
        Schema::create('data_berita', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penulis');
            $table->string('judul_berita');
            $table->date('tanggal_berita_dibuat');
            $table->text('isi_berita');
            $table->string('foto_berita')->nullable();
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
        Schema::dropIfExists('data_berita');
    }
};
