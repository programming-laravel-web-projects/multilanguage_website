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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name1');
$table->text('value1')->nullable();
$table->text('name2')->nullable();
$table->text('value2')->nullable();
$table->text('name3')->nullable();
$table->text('value3')->nullable();
$table->string('category')->nullable();
$table->string('dep')->nullable();
$table->integer('sequence')->nullable()->default(0);
$table->string('section')->nullable();
$table->string('location')->nullable();
$table->integer('is_active')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
