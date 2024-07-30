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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 11, 2);
            $table->string('short_description');
            $table->text('description');
            $table->integer('quantity');
            $table->unsignedInteger('category_product_id');
            $table->unsignedInteger('product_status_id');
            $table->foreign('category_product_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('product_statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
