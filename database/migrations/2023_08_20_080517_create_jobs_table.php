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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_region');
            $table ->string('company');
            $table->string('job_type');
            $table->integer('vacancy'); // Using integer for vacancy count
            $table->string('experience');
            $table->decimal('salary', 10, 2); // Using decimal for precise salary
            $table->string('gender');
            $table->date('application_deadline'); // Using date for application deadline
            $table->text('job_description'); // Using text for long text fields
            $table->text('responsibilities');
            $table->text('education_experience');
            $table->text('other_benefits');
            $table->text('image'); // Using text for storing image path or URL
            $table->text('category');
            $table->timestamps(); // Adding timestamps for created_at and updated_at
        });
    }
    /**s
     * Reverse the migrations.
    //  */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};




            
      





