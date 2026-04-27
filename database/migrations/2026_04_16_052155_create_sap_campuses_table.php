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
        Schema::create('sap_campuses', function (Blueprint $table) {
             $table->id();
            $table->string('object_type', 50);
            $table->bigInteger('object_id');
            $table->string('object_abbreviation', 50);
            $table->string('object_name', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sap_campuses');
    }
};
