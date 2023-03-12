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
            $table->float('price');
            $table->boolean('in_stock');
            $table->text('description');
            $table->string('photo');
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
