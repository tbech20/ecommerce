<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('userEmail');
            $table->string('productIds');
            $table->string('quantity');
            $table->integer('price');
            $table->string('userAddress');
            $table->integer('userPhone');
            $table->string('userFirstName');
            $table->string('userLastName');
            $table->string('company')->nullable();
            $table->string('status')->default('pending');
            $table->string('userApartMent');
            $table->string('city');
            $table->string('country');
            $table->integer('postalCode');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
