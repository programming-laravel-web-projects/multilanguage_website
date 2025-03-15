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
        Schema::create('media_projects', function (Blueprint $table) {
            $table->id();      
$table->foreignId('project_id')->nullable();
$table->foreignId('media_id')->nullable();
$table->integer('sequence')->nullable()->default(0);
$table->integer('status')->nullable();
$table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.add_is_default_to_languages_table
     */
    public function down(): void
    {
        Schema::dropIfExists('media_projects');
    }
};
