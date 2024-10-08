<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('program_id')->constrained('programs');
            $table->string('class_number');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('ranking');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
