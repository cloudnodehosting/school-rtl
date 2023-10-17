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
        Schema::create('admissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('educational_year_id');
            $table->string('phone');
            $table->string('email')->nullable()->unique();
            $table->string('slug');
            $table->timestamps();

            $table->foreign('guardian_id')
            ->on('guardians')
            ->references('id')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('student_id')
            ->on('students')
            ->references('id')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreign('educational_year_id')
            ->on('educational_years')
            ->references('id')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
