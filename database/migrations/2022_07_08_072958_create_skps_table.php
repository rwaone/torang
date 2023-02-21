<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skps', function (Blueprint $table) {
            $table->id();
            $table->char('tahun',4);
            $table->foreignId('pegawai_id');
            $table->boolean('is_submitted');
            $table->date('submitted_at');
            $table->foreignId('atasan_id')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->date('approved_at')->nullable();
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
        Schema::dropIfExists('skps');
    }
}
