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
      Schema::create('users', function (Blueprint $table) {
         $table->id();
         $table->string('user_code')->unique();
         $table->string('first_name');
         $table->string('last_name');
         $table->string('email')->nullable();
         $table->string('phone_number')->unique();
         $table->string('id_number')->unique();
         $table->string('membership_type')->nullable();
         $table->string('avatar')->nullable();
         $table->string('id_front_image')->nullable();
         $table->string('id_back_imge')->nullable();
         $table->datetime('last_login')->nullable();
         $table->string('last_login_ip')->nullable();
         $table->integer('status')->nullable();
         $table->datetime('phone_number_verified_at')->nullable();
         $table->timestamp('email_verified_at')->nullable();
         $table->string('password');
         $table->rememberToken();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('users');
   }
};
