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
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id();
            $table->string('timesheet_name_id');
            $table->string('activity_type');
            $table->string('email');
            $table->dateTime('from_time');
            $table->dateTime('to_time');
            $table->decimal('hours', 20, 2);
            $table->decimal('billing_rate', 20, 2);
            $table->decimal('billing_amount', 20, 2)->default(0);
            $table->timestamps();

            $table->foreign('timesheet_name_id')->references('name_id')->on('timesheets')->onDelete('cascade');
            $table->foreign('activity_type')->references('name')->on('activity_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_logs');
    }
};
