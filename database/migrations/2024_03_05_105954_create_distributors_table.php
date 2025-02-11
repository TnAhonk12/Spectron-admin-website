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
        if (!Schema::hasTable('distributors')) {
            Schema::create('distributors', function (Blueprint $table) {
                $table->increments('id');
                $table->uuid('id_distributor');
                $table->string('code');
                $table->string('name');
                $table->string('country_code');
                $table->string('contact');
                $table->string('city_id');
                $table->string('province_id');
                $table->string('address');
                $table->boolean('is_active')->default(1)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};
