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
            $table->id();
            $table->string('title');
            $table->string('article')->unique();
            $table->float('retail_price');
            $table->float('configurator_price');
            $table->boolean('in_stock');
            $table->boolean('use_in_configurator');
            $table->text('description')->nullable();
            $table->string('img')->default('no_image.jpg');
            $table
                ->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();
            $table
                ->foreignId('product_type_id')
                ->constrained('product_types')
                ->cascadeOnDelete();
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
