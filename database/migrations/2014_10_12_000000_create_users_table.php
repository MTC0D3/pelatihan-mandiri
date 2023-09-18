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
            // NIK
            $table->bigInteger('nik')->unique();
            // Nama
            $table->string('name');
            // Tempat lahir
            $table->string('birthplace');
            // Tanggal Lahir
            $table->date('birthdate');
            // Alamat
            $table->text('address');
            // NIP
            $table->string('nip');
            // Instansi
            $table->string('agency');
            // Jabatan
            $table->string('position');
            // Alamat Instansi
            $table->text('agency_address');
            // Nomor HP
            $table->string('phone')->unique();
            // Email
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('users');
    }
};
