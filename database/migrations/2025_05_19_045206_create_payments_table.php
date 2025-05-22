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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->unsigned();
            $table->bigInteger('package_installment_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('payment_amount',['part','full'])->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('amount_due')->nullable();
            $table->enum('status',[0,1])->default(1);
            $table->string('payment_transaction_no')->nullable();
            $table->string('payment_transaction_image')->nullable();
            $table->string('mode_of_transaction')->nullable();
            $table->string('fine')->nullable();
            $table->string('total_paid_amount')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('package_installment_id')->references('id')->on('package_installments')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
