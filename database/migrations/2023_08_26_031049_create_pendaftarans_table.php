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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();

            //NIK
            $table->bigInteger('nik');

             // Nama
            $table->string('name');

            // Tempat Lahir
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

             // Nomor Hp
             $table->string('phone');

             // Email
             $table->string('email');

            $table->foreignId('pelatihan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('status');
            $table->datetime('registration_date');
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
        Schema::dropIfExists('pendaftarans');
    }
};
