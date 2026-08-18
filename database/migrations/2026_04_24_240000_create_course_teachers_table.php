<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_teachers', function (Blueprint $table) {
            $table->id();
            
            // Primera llave foranea
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('set null')
                  ->onUpdate('set null');
        
            // Segunda llave foranea
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('set null')
                  ->onUpdate('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_teachers');
    }
};
