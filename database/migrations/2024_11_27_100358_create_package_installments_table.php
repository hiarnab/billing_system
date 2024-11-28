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
        Schema::create('package_installments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id'); // Link to the package
            $table->decimal('amount', 10, 2); // Amount to be paid in this installment
            $table->timestamp('due_date'); // Due date for the installment
            $table->timestamp('payment_date')->nullable(); // Actual payment date
            $table->decimal('fine', 10, 2)->default(0); // Fine for late payment
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending'); // Status of the installment
            $table->timestamps();
        
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_installments');
    }
};
