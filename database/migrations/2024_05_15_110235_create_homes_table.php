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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('file_path')->nullable();
            $table->string('counter_number1')->nullable();
            $table->string('counter_text1')->nullable();
            $table->string('counter_number2')->nullable();
            $table->string('counter_text2')->nullable();
            $table->string('counter_number3')->nullable();
            $table->string('counter_text3')->nullable();
            $table->string('counter_number4')->nullable();
            $table->string('counter_text4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
