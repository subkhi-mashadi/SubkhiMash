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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('stack')->nullable();
            $table->string('github')->nullable();
            $table->string('live')->nullable();
            $table->string('cover_path')->nullable();
            $table->text('problem_id')->nullable();
            $table->text('problem_en')->nullable();
            $table->text('solution_id')->nullable();
            $table->text('solution_en')->nullable();
            $table->text('result_id')->nullable();
            $table->text('result_en')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
