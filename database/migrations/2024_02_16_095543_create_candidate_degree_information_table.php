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
        Schema::create('candidate_degree_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('degree_number')->nullable();
            $table->string('degree_type')->nullable();
            $table->string('university_name')->nullable();
            $table->string('department')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('cgpa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_degree_information');
    }
};
