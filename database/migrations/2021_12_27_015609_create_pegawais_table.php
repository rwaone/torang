<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->char('nip_lama',9);
            $table->char('nip_baru',18);
            $table->foreignId('golongan_id',2);
            $table->foreignId('jabatan_id',2);
            $table->foreignId('satker_id',4);
            $table->foreignId('atasan_id',18);
            $table->foreignId('penilai_id',18);
            $table->string('foto')->default('foto-pegawai/user.png');
            $table->string('status',20)->default('Aktif');
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
        Schema::dropIfExists('pegawais');
    }
}
