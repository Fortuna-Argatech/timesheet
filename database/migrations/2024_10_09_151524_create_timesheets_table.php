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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->string('timesheet_id')->unique();
            $table->string('employee_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_hours', 20, 2);
            $table->decimal('total_billable_hours', 20, 2);
            $table->decimal('total_costing_amount', 20, 2)->nullable();
            $table->decimal('total_billable_amount', 20, 2);
            $table->decimal('total_billed_amount', 20, 2)->nullable();
            $table->decimal('per_billed', 20, 2)->default(0)->nullable();
            $table->string('status');
            $table->enum('padlock', ['unlocked', 'locked'])->default('unlocked');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheets');
    }
};
