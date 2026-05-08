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
        Schema::create('published_offer_letters', function (Blueprint $table) {
            $table->id();
            $table->string('oas_id');
            $table->unsignedBigInteger('offer_letter');
            $table->integer('status')->default(1)->comment('1 for published, 0 for unpublished');
            $table->string('due_date')->nullable();
            $table->foreign('oas_id')->references('oas_id')->on('applications')->onDelete('cascade');
            $table->foreign('offer_letter')->references('id')->on('offer_letters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('published_offer_letters');
    }
};
