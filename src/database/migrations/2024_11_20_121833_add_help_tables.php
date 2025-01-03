<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('helps', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('help_category_id');

            $table->string('name');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');

            $table->foreign('help_category_id')->references('id')->on('helps_category');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helps');
    }
};
