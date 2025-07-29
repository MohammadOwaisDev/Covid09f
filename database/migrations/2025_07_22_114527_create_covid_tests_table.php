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
        Schema::create('covid_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');

            $table->string('test_type');
            $table->string('symptoms');
            $table->string('test_result');
            $table->date('test_result_date');
            $table->timestamps();
  $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covid_tests');
    }
};
