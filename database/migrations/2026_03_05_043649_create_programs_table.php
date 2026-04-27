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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('department_id');
            $table->string('program_name');
            $table->string('program_type')->comment('UG=Undergraduate, PG=Postgraduate, D=Certificate, Ph.D=Doctoral');
            $table->string('course_leader')->nullable();
            $table->string('email')->nullable();
            $table->integer('active')->default(1)->comment('1=Active, 0=Inactive');
            $table->integer('sap_status')->default(0)->comment('1=complete, 0=Incomplete');
            $table->integer('fee_status')->default(0)->comment('1=complete, 0=Incomplete');
            $table->integer('session_id')->nullable();
            $table->decimal('AdmissionFee', 10, 2)->nullable();
            $table->string('accountno')->nullable();
            $table->string('bankname')->nullable();
            $table->string('branchcode')->nullable();
            $table->string('bankaddress')->nullable();
            $table->integer('facultyRepresentative_id')->nullable();
            $table->integer('examiner_id')->nullable();
            $table->integer('bankaccount_id')->nullable();
            $table->integer('final_fee_id')->nullable();
            $table->boolean('meritlistdata')->default(0);
            $table->integer('entrytestpercentage')->nullable();
            $table->integer('entryinterviewpercentage')->nullable();
            $table->unsignedBigInteger('program_map_id')->nullable();
            $table->timestamps();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('program_map_id')->references('id')->on('program_mappings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
