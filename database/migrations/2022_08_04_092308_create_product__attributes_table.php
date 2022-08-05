<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->default(0);
            $table->string('sku');
            $table->string('attr_image');
            $table->string('mrp');
            $table->string('price');
            $table->string('quantity');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product__attributes');
    }
};
