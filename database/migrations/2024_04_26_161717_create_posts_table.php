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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
$table->string('slug')->nullable();
$table->text('meta_key')->nullable();
$table->text('content')->nullable();
$table->foreignId('category_id')->nullable();
$table->integer('sequence')->nullable()->default(0);
$table->integer('status')->nullable()->default(0);
$table->foreignId('update_user_id')->nullable();
$table->foreignId('create_user_id')->nullable();
$table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
