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
        Schema::create('candidate_job_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('designation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('depareture_date')->nullable();
            $table->string('experience_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_job_experiences');
    }
};
