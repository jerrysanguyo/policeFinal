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
        Schema::create('course_extensions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('high_training')->constrained('programs');
            $table->date('date_graduation');
            $table->integer('order_merit');
            $table->enum('ftoc', ['yes', 'no']);
            $table->enum('qe_result', ['passed', 'failed']);
            $table->date('date_qualifying');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_extensions');
    }
};
