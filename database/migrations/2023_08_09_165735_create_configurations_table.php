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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_type_id")->constrained('product_types');
            $table->foreignId('configuration_product_type_id')->constrained('product_types');
            $table->integer('max_count')->default(1);
            $table->integer('quantity_of_divided_item')->default(1);
            $table->boolean('is_divided')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
