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

            $table->string('name');
            $table->decimal('price', 10, 2);

            $table->enum('gender', ['Women', 'Men']);

            $table->text('description')->nullable();

            $table->string('category');
            $table->string('brand')->nullable();

            $table->enum('tag', [
                'None',
                'Popular',
                'Best Selling',
                'Featured',
                'New Arrival'
            ])->default('None');

            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('discount_percent', 5, 2)->nullable();

            $table->integer('stock');

            $table->string('image');

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
