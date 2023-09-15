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
            $table->string('nik')->nullable();

             // Nama
            $table->string('name')->nullable();

            // NIP
            $table->string('nip')->nullable();

             // Instansi
            $table->string('agency')->nullable();

             // Jabatan
            $table->string('position')->nullable();

            // Alamat Instansi
             $table->text('agency_address')->nullable();

            // Tempat Lahir
            $table->string('birthplace')->nullable();

            // Tanggal Lahir
            $table->date('birthdate')->nullable();

             // Nomor Hp
             $table->string('phone')->nullable();

             // Email
             $table->string('email')->nullable();

             // Alamat
             $table->text('address')->nullable();


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
