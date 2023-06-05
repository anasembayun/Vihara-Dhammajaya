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
        Schema::create('data_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat');
            $table->date('tanggal_mulai');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('foto_kegiatan')->nullable();
            $table->text('keterangan');
            $table->integer('status');
            $table->string('created_by');
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
        Schema::dropIfExists('data_kegiatan');
    }
};
