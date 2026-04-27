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
        Schema::create('admission_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->string('session_year');
            $table->string('session_type')->comment('Spring, Fall, Summer');
            $table->string('session_status')->default('1')->comment('1=Active, 0=Inactive');
            $table->timestamps();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_sessions');
    }
};
