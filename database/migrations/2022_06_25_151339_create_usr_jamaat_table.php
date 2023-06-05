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
        Schema::create('usr_jamaat', function (Blueprint $table) {
            $table->id();
            $table->string('id_code')->nullable();
            // $table->string('id_code')->unique();
            $table->string('name');
            $table->string('no_handphone_1');
            $table->string('no_handphone_2')->nullable();
            $table->string('email')->nullable();
            // $table->string('email')->unique();
            $table->string('password');
            $table->string('gol_darah')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan_kecamatan')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nama_kerabat')->nullable();
            $table->string('no_handphone_kerabat')->nullable();
            $table->string('alamat_kerabat')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('last_visit')->nullable();
            $table->string('foto_profile')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usr_jamaat');
    }
};
