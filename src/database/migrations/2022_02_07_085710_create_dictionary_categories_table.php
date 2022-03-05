<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_categories', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->string('value');
            $table->integer('parent_id')->default(0);
            $table->enum('status', ['enabled', 'disabled'])->default('disabled');

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
        Schema::dropIfExists('dictionary_categories');
    }
}
