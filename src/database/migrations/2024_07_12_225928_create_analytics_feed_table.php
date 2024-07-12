<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics_feed', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('show_id');

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('url')->nullable();
            $table->string('agent')->nullable();
            $table->enum('os', ['ios', 'android', 'macos', 'windows', 'ubuntu', 'other'])->default('other');

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
        Schema::dropIfExists('analytics_feed');
    }
}
