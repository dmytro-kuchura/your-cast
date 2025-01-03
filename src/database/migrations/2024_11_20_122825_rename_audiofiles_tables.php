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
        Schema::rename('audio_files', 'shows_audio_files');
        Schema::rename('audio_file_links', 'shows_audio_file_links');
        Schema::rename('analytics_audio', 'shows_analytics_audio');
        Schema::rename('analytics_feed', 'shows_analytics_feed');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('shows_audio_files', 'audio_files');
        Schema::rename('shows_audio_file_links', 'audio_file_links');
        Schema::rename('shows_analytics_audio', 'analytics_audio');
        Schema::rename('shows_analytics_feed', 'analytics_feed');
    }
};
