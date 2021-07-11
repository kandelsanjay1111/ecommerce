<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand');
            $table->string('model');
            $table->string('image')->nullable();
            $table->longText('short_desc');
            $table->longText('keywords');
            $table->longText('technical_specification');
            $table->string('warranty');
            $table->enum('status',['active','deactive']);
            $table->enum('is_promo',['yes','no']);
            $table->enum('is_featured',['yes','no']);
            $table->enum('is_discounted',['yes','no']);
            $table->enum('is_trending',['yes','no']);
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
        Schema::dropIfExists('products');
    }
}
