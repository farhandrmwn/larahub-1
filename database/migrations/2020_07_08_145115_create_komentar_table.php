<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertanyaan_id')->nullable();
            $table->unsignedBigInteger('jawaban_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('isi');
            $table->dateTime("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
