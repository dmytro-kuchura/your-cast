<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // 01. Info
            $table->string('title');
            $table->text('description');

            // 02. Artwork
            $table->string('artwork')->nullable();

            // 03. Format
            $table->enum('format', ['episodic', 'serial'])->default('episodic');

            // 04. Details
            $table->string('timezone')->default('CET');
            $table->string('language')->default('en');
            $table->boolean('explicit')->default(false);

            // 05. Categorization
            $table->text('category')->nullable();
            $table->string('tags')->nullable();

            // 06. Owner details
            $table->string('author');
            $table->string('podcast_owner');
            $table->string('email_owner');
            $table->string('copyright');

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('shows');
    }
}
