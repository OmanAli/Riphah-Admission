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
        Schema::create('challan_infos', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id');
            $table->string('sap_prg_id');
            $table->string('doc_id');
            $table->string('con_id');
            $table->string('total_amount');
            $table->string('installments');
            $table->string('due_amount');
            $table->string('remaining_amount');
            $table->string('date');
            $table->string('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challan_infos');
    }
};
