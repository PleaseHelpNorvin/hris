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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->integer('sss_gsis');
            $table->integer('philhealth');
            $table->integer('home');
            $table->integer('ca');
            $table->integer('uniform');
            $table->integer('others');
            $table->integer('sss_loan');
            $table->integer('home_loan');
            $table->integer('hmo');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('deductions');
    }
};
