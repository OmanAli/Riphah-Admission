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
        Schema::create('sap_programs', function (Blueprint $table) {
            $table->id();
            $table->string('sap_region')->nullable();
            $table->string('sap_region_id')->nullable();
            $table->string('sap_campus_name')->nullable();
            $table->string('sap_campus_id')->nullable();
            $table->string('sap_institute_name')->nullable();
            $table->string('sap_institute_id')->nullable();
            $table->string('sap_program_name')->nullable();
            $table->string('sap_program_id')->nullable();
            $table->string('profit_center')->nullable();
            $table->string('fee_category')->nullable();
            $table->string('oas_prg_name')->nullable();
            $table->string('oas_prg_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_branch_code')->default('0000');
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('house_bank_id')->nullable();
            $table->string('company_code')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('hk_tid')->nullable();
            $table->string('bank_gl')->nullable();
            $table->string('is_adm_challan')->nullable();
             $table->timestamps();
            // $table->foreign('sap_campus_id')->references('id')->on('s_a_p_campuses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sap_programs');
    }
};
