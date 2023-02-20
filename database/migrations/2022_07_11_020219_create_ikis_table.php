<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikis', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('pegawai_id');
            $table->foreignId('perjanjian_kinerja_id');
            $table->string('kinerja');
            $table->string('iki');
            $table->foreignId('timkerja_id');
            $table->foreignId('butir_id')->nullable(true);
            $table->string('satuan_id');
            $table->integer('target_min');
            $table->integer('target_max');
            $table->integer('realisasi');
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
        Schema::dropIfExists('ikis');
    }
}
