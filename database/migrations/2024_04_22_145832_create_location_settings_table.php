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
        Schema::create('location_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->nullable();
            $table->foreignId('setting_id')->nullable();
            $table->string('type')->nullable();
            $table->string('dep')->nullable();
            $table->integer('sequence')->nullable()->default(0);;
            $table->integer('is_active')->nullable()->default(0);;
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_settings');
    }
};
