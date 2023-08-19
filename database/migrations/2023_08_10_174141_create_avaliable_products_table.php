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
        Schema::create('available_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('for_product_id')->constrained('products');
            $table->foreignId('available_product_id')->constrained('products');
            $table->foreignId('configuration_id')->constrained('configurations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_products');
    }
};
