<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id'); // Use the same data type as the referenced column
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->string('time_log_id')->unique();
            $table->string('time_in_am')->nullable();
            $table->string('time_out_am')->nullable();
            $table->string('time_in_pm')->nullable();
            $table->string('time_out_pm')->nullable();
            $table->date('date_log');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::table('time_logs', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('time_logs');
    }
};
