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
        Schema::table('users', function (Blueprint $table) {
            $table -> string('cv')->nullable();
            $table -> string('job_title')->nullable();
            $table -> string('bio')->nullable();
            $table -> string('twitter')->nullable();
            $table -> string('facebook')->nullable();
            $table -> string('linkedin')->nullable();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
