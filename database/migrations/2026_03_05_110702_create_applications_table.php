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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('campus')->nullable();
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->string('session')->nullable();
            $table->string('level')->comment('UG=Undergraduate, PG=Postgraduate, D=Diploma/Certificate, Ph.d=Doctoral, MBBS/BDS=MBBS/BDS');
            $table->string('program')->nullable();
            $table->unsignedBigInteger('program_preference_1')->nullable();
            $table->unsignedBigInteger('program_preference_2')->nullable();
            $table->unsignedBigInteger('program_preference_3')->nullable();
            $table->unsignedBigInteger('program_preference_4')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('nationality')->nullable();
            $table->string('cnic');
            $table->string('dob');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->string('father_name');
            $table->string('father_occupation')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('country');
            $table->string('last_institute')->nullable();
            $table->string('phone')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('hear_aboutus')->nullable();
            $table->integer('application_status')->default(0)->comment('0=Submitted, 1=Accepted, 2=Rejected');
            $table->string('application_program')->nullable();
            $table->integer('fee_status')->default(0)->comment('0=Not Paid, 1=Paid');
            $table->integer('ok_for_admission')->nullable()->comment('0=Pending, 1=Eligible, 2=Not Eligible');
            $table->string('rejection_reason')->nullable();
            $table->string('application_type')->default('General')->comment('general, german_course, mbbs_bds');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->foreign('program_preference_1')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('program_preference_2')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('program_preference_3')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('program_preference_4')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
