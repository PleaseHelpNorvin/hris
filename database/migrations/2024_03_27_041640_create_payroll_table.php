<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_period');
            $table->string('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->decimal('basic_pay', 10, 2);
            $table->decimal('rate_per_hr', 8, 2);
            $table->decimal('rate_per_min', 8, 2);
            $table->decimal('gross_pay', 10, 2);
            $table->decimal('leave', 10, 2);
            $table->decimal('night_differtime', 10, 2);
            $table->decimal('ot_pay', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
};
