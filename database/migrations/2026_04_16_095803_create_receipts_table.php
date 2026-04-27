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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id');
            $table->string('name');
            $table->string('father_name');
            $table->integer('program1_id')->nullable();
            $table->string('program1_name')->nullable();
            $table->integer('program2_id')->nullable();
            $table->string('program2_name')->nullable();
            $table->integer('program3_id')->nullable();
            $table->string('program3_name')->nullable();
            $table->integer('program4_id')->nullable();
            $table->string('program4_name')->nullable();
            $table->decimal('applicable_fee', 13, 2)->nullable();
            $table->decimal('cash_received', 13, 2)->nullable();
            $table->integer('created_by')->nullable();
            $table->string('created_by_name')->nullable();
            $table->integer('campus_id')->nullable();
            $table->string('campus')->nullable();
            $table->timestamps();
            $table->foreign('oas_id')->references('oas_id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
