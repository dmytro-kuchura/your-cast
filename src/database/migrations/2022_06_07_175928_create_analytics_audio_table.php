<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics_audio', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('audio_file_id');

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('url')->nullable();
            $table->enum('os', ['ios', 'android', 'macos', 'windows', 'ubuntu', 'other'])->default('other');

            $table->foreign('audio_file_id')->references('id')->on('audio_files');

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
        Schema::dropIfExists('analytics_audio');
    }
}
