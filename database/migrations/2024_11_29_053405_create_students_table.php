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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('scholar_no')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->enum('status',['active','inactive'])->default('active')->nullable();
            $table->string('uniqid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
