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
            $table->increments('id'); 
            $table->string('username')->unique()->nullable(false);
            $table->string('fullname')->nullable();
            $table->string('avatar')->default('profile.png');
            $table->string('password')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('role')->default(2);
            $table->unsignedInteger('status')->default(1);
            $table->foreign('status')->references('id')->on('user_statuses')->onDelete('cascade');
            $table->foreign('role')->references('id')->on('user_roles')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
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
