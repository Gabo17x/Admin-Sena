<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('apprentices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('cell_number');
            
            // Llaves foráneas según el diagrama
            $table->foreignId('course_id')
                  ->nullable()
                  ->constrained('courses')
                  ->onDelete('set null');

            $table->foreignId('computer_id')
                  ->nullable()
                  ->constrained('computers')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apprentices');
    }
};