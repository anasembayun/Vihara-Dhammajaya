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
        Schema::create('detail_donasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_data_donasi');
            $table->bigInteger('id_usr_jamaat');
            $table->decimal('jumlah_donasi', 14, 2);
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
        Schema::dropIfExists('detail_donasi');
    }
};
