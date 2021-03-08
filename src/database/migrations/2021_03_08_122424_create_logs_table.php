<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            $table->longText('message');
            $table->longText('context')->nullable();
            $table->enum('level', ['info', 'error', 'warning', 'debug'])->index()->default('info');

            $table->string('remote_addr')->nullable();
            $table->string('user_agent')->nullable();
            $table->text('request_header')->nullable();
            $table->text('request_body')->nullable();

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
        Schema::dropIfExists('logs');
    }
}
