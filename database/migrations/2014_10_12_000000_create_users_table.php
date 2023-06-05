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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_handphone');
            $table->string('gol_darah')->nullable();
            $table->string('jenis_kelamin');
            $table->string('role');
            $table->string('username')->unique();
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');         
            $table->string('password');
            $table->bigInteger('id_role');
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
        Schema::dropIfExists('users');
    }
};
