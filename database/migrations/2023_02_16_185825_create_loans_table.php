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
      Schema::create('loans', function (Blueprint $table) {
         $table->id();
         $table->string('loan_code');
         $table->string('user_code')->unique();
         $table->dateTime('application_date')->nullable();
         $table->dateTime('approved_date')->nullable();
         $table->string('type')->nullable();
         $table->string('amount_applied')->nullable();
         $table->text('reason')->nullable();
         $table->string('interest_rate')->nullable();
         $table->string('interest_amount')->nullable();
         $table->string('repayment_amount')->nullable();
         $table->string('repayment_period')->nullable();
         $table->string('processing_fee')->nullable();
         $table->string('repayment_date')->nullable();
         $table->string('grace_period')->nullable();
         $table->integer('approval_status')->nullable();
         $table->string('approved_by')->nullable();
         $table->dateTime('date_approved')->nullable();
         $table->integer('payment_status')->nullable();
         $table->string('amount_paid')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('loans');
   }
};
