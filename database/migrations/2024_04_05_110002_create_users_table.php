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
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('avatar')->default('profile.png');
            $table->string('password');
            $table->string('email')->unique(); 
            // Role 1 = Admin, 2 = User
            $table->unsignedInteger('role_id')->default(2);
            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');
            // Status 1 = Active, 2 = Inactive 
            $table->unsignedInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('user_statuses')->onDelete('cascade');
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
