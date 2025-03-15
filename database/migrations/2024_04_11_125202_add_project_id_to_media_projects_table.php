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
        Schema::table('media_projects', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable();
            $table->foreignId('media_id')->nullable();
            $table->integer('sequence')->nullable()->default(0);
            $table->integer('status')->nullable();
            $table->text('notes')->nullable();
        });
        Schema::table('lang_projects', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable();
            $table->foreignId('lang_id')->nullable();
            $table->string('title_trans')->nullable();
            $table->text('content_trans')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media_projects', function (Blueprint $table) {
            //
        });
    }
};
