<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('show_id');

            $table->string('title');
            $table->longText('description');

            $table->string('content');
            $table->string('image')->nullable();
            $table->integer('duration');
            $table->enum('explicit', ['yes', 'no'])->default('no');

            $table->integer('episode');
            $table->integer('season');
            $table->string('episode_type');

            $table->enum('status', ['enabled', 'disabled', 'drafted'])->default('drafted');


            $table->foreign('show_id')->references('id')->on('shows');

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
