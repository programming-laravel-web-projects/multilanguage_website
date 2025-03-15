<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. 
     * php artisan make:migration add_main_table_to_location_settings_table
     *php artisan make:migration add_code_to_categories_table
     * php artisan make:migration add_code_to_posts_table
     */
    public function up(): void
    {
        Schema::create('media_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->nullable();
$table->foreignId('category_id')->nullable();
$table->foreignId('post_id')->nullable();
$table->string('main_table')->nullable();
$table->integer('sequence')->nullable()->default(0);
$table->integer('status')->nullable()->default(0);
$table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_posts');
    }
};
