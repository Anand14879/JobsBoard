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
        Schema::create('jobsaved', function (Blueprint $table) {
            $table->id();
            $table->string('job_id');
            $table->string('user_id');
            $table->text('image'); 
            $table->string('job_title');
            $table->string('job_region');
            $table->string('job_type');
            $table ->string('company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobsaved');
    }
};
