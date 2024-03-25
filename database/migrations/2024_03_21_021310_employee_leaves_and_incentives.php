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
        Schema::create('employee_leaves_and_incentives', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique(); // Change to string
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade'); // Change the reference column
            $table->integer('sick_leave_days')->default(0);
            $table->integer('vacation_days')->default(0);
            $table->decimal('incentive', 10, 2)->default(0.00);
            $table->integer('birthday_leave_days')->default(0);
            $table->integer('paternal_leave_days')->default(0);
            $table->integer('maternal_leave_days')->default(0);
            $table->integer('bereavement_leave_days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leaves_and_incentives');
    }
};
