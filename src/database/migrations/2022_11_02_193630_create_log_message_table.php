<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_message', function (Blueprint $table) {
            $table->id();

            $table->string('level');
            $table->string('level_name')->nullable();
            $table->longText('message')->nullable();
            $table->longText('context')->nullable();
            $table->longText('extra')->nullable();
            $table->timestamp('logged_at');

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
        Schema::dropIfExists('log_message');
    }
}
