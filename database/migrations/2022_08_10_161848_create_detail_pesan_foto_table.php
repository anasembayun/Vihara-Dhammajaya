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
        Schema::create('detail_pesan_foto', function (Blueprint $table) {
            $table->id();
            $table->string('kode');// a b c d e f g
            $table->string('kode_lokasi');// a1 a2 a3 a4 a5
            $table->integer('status');// 1->booking 0
            $table->integer('id_leluhur')->nullable();
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
        Schema::dropIfExists('detail_pesan_foto');
    }
};
