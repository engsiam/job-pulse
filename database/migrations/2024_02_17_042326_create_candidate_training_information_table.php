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
        Schema::create('candidate_training_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('training_number');
            $table->string('training_name')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('completion_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_training_information');
    }
};
