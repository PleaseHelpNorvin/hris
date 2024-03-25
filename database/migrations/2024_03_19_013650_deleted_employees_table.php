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
        //
        Schema::create('deletedemployees', function (Blueprint $table) {
            $table->string('employee_id');
            $table->string('name');
            $table->string('position');
            $table->string('department');
            $table->string('basic_salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('deletedemployees');
    }
};
