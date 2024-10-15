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
        Schema::create('physical_pfts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('month');
            $table->integer('year');
            $table->date('date_pft');
            $table->enum('remarks', ['passed', 'failed']);
            $table->decimal('score', 3,2);
            $table->enum('type', ['remedial', 'not']);
            $table->decimal('pft_result', 3,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_pfts');
    }
};
