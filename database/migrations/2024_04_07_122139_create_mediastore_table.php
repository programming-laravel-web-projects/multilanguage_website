<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mediastore', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('caption')->nullable();
            $table->string('title')->nullable();
            $table->string('local_path')->nullable();
            $table->string('type')->nullable();
            $table->integer('sequence')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediastore');
    }
};
