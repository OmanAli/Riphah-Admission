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
        Schema::create('german_language_applications', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('level');
            $table->string('campus');
            $table->string('program');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('nationality');
            $table->string('cnic');
            $table->string('dob');
            $table->string('gender');
            $table->string('father_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('institute');
            $table->string('hear_aboutus');
            $table->string('city');
            $table->string('country');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('german_language_applications');
    }
};
