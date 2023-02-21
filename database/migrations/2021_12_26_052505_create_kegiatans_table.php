<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id');
            $table->date('tanggal');
            $table->string('nama');
            $table->char('kriteria');
            $table->foreignId('butir_id');
            $table->foreignId('iki_id');
            $table->foreignId('timkerja_id',2)->nullable();
            $table->string('lokasi');
            $table->integer('target');
            $table->foreignId('satuan_id');
            $table->integer('realisasi')->nullable();
            $table->text('keterangan');
            $table->smallinteger('nilai')->nullable();
            $table->char('flag',1)->nullable();
            $table->char('konfirmasi')->nullable();
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
        Schema::dropIfExists('kegiatans');
    }
}
