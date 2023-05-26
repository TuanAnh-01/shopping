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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category_id')->nullable();
            $table->string('branding_id')->nullable();
            $table->string('size_id')->nullable();
            $table->integer('price');
            $table->integer('sale')->nullable();
            $table->integer('price_sale')->nullable();
            $table->text('content')->nullable();
            $table->string('images');
            $table->string('images_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
