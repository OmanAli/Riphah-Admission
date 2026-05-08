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


        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id');
            $table->string('matric_degree');
            $table->string('matric_passing_year');
            $table->string('matric_total_marks');
            $table->string('matric_obtained_marks');
            $table->string('matric_institute');
            $table->string('matric_board_university');
            $table->string('intermediate_degree');
            $table->string('intermediate_passing_year');
            $table->string('intermediate_total_marks');
            $table->string('intermediate_obtained_marks');
            $table->string('intermediate_institute');
            $table->string('intermediate_board_university');
            $table->string('bachelor_degree')->nullable();
            $table->string('bachelor_passing_year')->nullable();
            $table->string('bachelor_total_marks')->nullable();
            $table->string('bachelor_obtained_marks')->nullable();
            $table->string('bachelor_institute')->nullable();
            $table->string('bachelor_board_university')->nullable();
            $table->timestamps();
            $table->foreign('oas_id')->references('oas_id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_details');
    }
};
