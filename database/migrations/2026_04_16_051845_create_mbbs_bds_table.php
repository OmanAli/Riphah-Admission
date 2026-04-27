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
        Schema::create('mbbs_bds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('oas_id')->unique();
            $table->string('program')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('father_name');
            $table->string('cnic');
            $table->integer('haifz_quran')->default(0)->comment('0=No, 1=Yes');
            $table->string('quota');
            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->string('address');
            $table->string('country');
            $table->string('cnic_front')->nullable();
            $table->string('cnic_back')->nullable();
            $table->string('education_level_1')->nullable();
            $table->string('education_level_2')->nullable();
            $table->string('education_level_1_total_marks')->nullable();
            $table->string('education_level_2_total_marks')->nullable();
            $table->string('education_level_1_obtained_marks')->nullable();
            $table->string('education_level_2_obtained_marks')->nullable();
            $table->string('education_level_1_result_card')->nullable();
            $table->string('education_level_2_result_card')->nullable();
            $table->string('entrance_total_marks')->nullable();
            $table->string('entrance_obtained_marks')->nullable();
            $table->string('entrance_year')->nullable();
            $table->string('entrance_roll_number')->nullable();
            $table->string('entrance_passed_from')->nullable();
            $table->string('entrance_result_card')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbbs_bds');
    }
};
