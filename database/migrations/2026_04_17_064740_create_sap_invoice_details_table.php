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
        Schema::create('sap_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
            $table->string('oas_id');
            $table->string('bank_id')->nullable();
            $table->string('hk_tid')->nullable();
            $table->string('campus_id')->nullable();
            $table->string('program_id')->nullable();
            $table->string('total_amount');
            $table->string('installments')->default(0);
            $table->string('amount_due')->nullable();
            $table->string('remaining')->nullable();
            $table->string('due_date')->nullable();
            $table->string('status')->nullable();
            $table->string('sap_posting')->nullable();
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sap_invoice_details');
    }
};
