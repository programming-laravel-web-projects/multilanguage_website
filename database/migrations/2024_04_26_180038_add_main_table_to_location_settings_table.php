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
        Schema::table('location_settings', function (Blueprint $table) {
            $table->string('main_table')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('post_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_settings', function (Blueprint $table) {
            //
        });
    }
};
