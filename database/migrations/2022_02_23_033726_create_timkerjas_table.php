<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimkerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timkerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('satker_id');
            $table->foreignId('ketua_id');
            $table->foreignId('supervisor_id')->nullable();
            $table->smallInteger('tahun');
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
        Schema::dropIfExists('timkerjas');
    }
}
