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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('email');
            $table->unsignedInteger('order_id');
            $table->string('sub_total');
            $table->string('discount');
            $table->string('total');
            $table->string('date');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
