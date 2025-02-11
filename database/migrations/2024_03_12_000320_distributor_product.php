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
        if (!Schema::hasTable('distributor_products')) {
        Schema::create('distributor_products', function (Blueprint $table) {
                $table->increments('id');
                $table->uuid('id_distributor_product')->unique();
                $table->unsignedInteger('distributor_id');
                $table->unsignedInteger('product_id');
                $table->string('serial_number');
                $table->boolean('is_active')->default(1)->nullable();
                $table->timestamps();

                $table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            });
        }
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributor_products');
    }
};
