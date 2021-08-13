<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('show_id');
            $table->unsignedBigInteger('audio_id');

            $table->string('title');
            $table->longText('description');
            $table->string('cover')->nullable();

            $table->integer('episode');
            $table->integer('season')->default(1);
            $table->enum('episode_type', ['full', 'trailer', 'bonus'])->default('full');

            $table->string('content');

            $table->integer('duration');

            $table->enum('status', ['enabled', 'disabled', 'drafted'])->default('drafted');

            $table->foreign('show_id')->references('id')->on('shows');
            $table->foreign('audio_id')->references('id')->on('audio_files');

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
        Schema::dropIfExists('podcasts');
    }
}
