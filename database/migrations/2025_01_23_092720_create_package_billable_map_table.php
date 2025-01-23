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
        Schema::create('package_billable_maps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->unsigned();
            $table->bigInteger('billable_id')->unsigned();
            $table->decimal('amount', 5, 2)->default(0);
            $table->decimal('discount', 5, 2)->default(0);
            $table->decimal('gst', 5, 2)->default(0);
            $table->decimal('net_price', 5, 2)->default(0);
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('billable_id')->references('id')->on('billable_items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_billable_maps');
    }
};
