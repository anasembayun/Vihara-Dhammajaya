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
        Schema::create('data_donasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan_donasi');
            $table->date('tanggal_mulai_donasi');
            $table->date('tanggal_selesai_donasi');
            $table->string('foto_kegiatan_donasi')->nullable();
            $table->text('keterangan_donasi');
            $table->decimal('total_donasi', 14, 2);
            $table->integer('total_donatur');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('data_donasi');
    }
};
