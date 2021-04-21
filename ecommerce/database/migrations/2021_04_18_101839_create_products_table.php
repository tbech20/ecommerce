<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->integer('stock');
            $table->string('category');
            $table->integer('salePrice')->nullable();
            $table->integer('rating');
            $table->string('type');
            $table->string('frontImage');
            $table->string('mainImage');
            $table->string('subImage1');
            $table->string('subImage2');
            $table->string('subImage3')->nullable();
            $table->string('subImage4')->nullable();
            $table->string('subImage5')->nullable();
            $table->integer('price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
