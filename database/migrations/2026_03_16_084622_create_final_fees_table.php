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
        Schema::create('final_fees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unsignedBigInteger('oas_program_id')->unique();
            $table->foreign('oas_program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->decimal('admissionFee', 13, 2);
            $table->decimal('processingFee', 13, 2);
            $table->decimal('registrationFee', 13, 2);
            $table->decimal('pharmCouncilFee', 13, 2);
            $table->decimal('collegeSecurityFee', 13, 2);
            $table->decimal('idCardFee', 13, 2);
            $table->decimal('tuitionFee', 13, 2);
            $table->decimal('examinationFee', 13, 2);
            $table->decimal('semesterEnrollFee', 13, 2);
            $table->decimal('taxFee', 13, 2);
            $table->decimal('service_charge', 13, 2);
            $table->integer('credit_hour');
            $table->decimal('per_credit_hour', 13, 2);
            $table->decimal('total_fee', 13, 2);
            $table->decimal('income_tax', 13, 2);
            $table->decimal('net_fee', 13, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_fees');
    }
};
