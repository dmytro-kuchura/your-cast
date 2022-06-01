<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('audio_file_link_id');

            $table->string('duration')->nullable();
            $table->string('size')->nullable();
            $table->string('link');
            $table->enum('status', ['enabled', 'disabled', 'drafted'])->default('drafted');

            $table->foreign('audio_file_link_id')->references('id')->on('audio_file_links');

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
        Schema::dropIfExists('audio_files');
    }
}
