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
        Schema::create('fee_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id');
            $table->integer('payment_status')->default(0)->comment('0 = Not Paid, 1 = Paid');
            $table->timestamp('payment_date')->nullable();
            $table->integer('refund_status')->default(0)->comment('0 = Not Refunded, 1 = Refunded');
            $table->timestamp('refund_date')->nullable();
            $table->integer('admission_fee_status')->default(0)->comment('0 = Not Paid, 1 = Paid');
            $table->timestamp('admission_fee_date')->nullable();
            $table->integer('enrollment_status')->default(0)->comment('0 = Not Enrolled, 1 = Enrolled');
            $table->unsignedBigInteger('admitted_program_id')->nullable();
            $table->timestamps();
            $table->foreign('admitted_program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('oas_id')->references('oas_id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_admissions');
    }
};
