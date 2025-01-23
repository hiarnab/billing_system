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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('name');
            $table->decimal('base_price', 10, 2); // Base price of the package
            $table->decimal('discount_percentage', 5, 2)->default(0); // Discount if any
            $table->decimal('net_price', 10, 2);
            $table->timestamps();
            // $table->unsignedBigInteger('billable_item_id');
            // $table->foreign('billable_item_id')->references('id')->on('packages')->onDelete('cascade')->after('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
