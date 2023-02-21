<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckps', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->char('bulan',2);
            $table->foreignId('pegawai_id');
            $table->boolean('is_submitted');
            $table->date('submitted_at');
            $table->foreignId('atasan_id')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->date('approved_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckps');
    }
}
