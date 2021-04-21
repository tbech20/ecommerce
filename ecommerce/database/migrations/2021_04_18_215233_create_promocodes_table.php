<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{

    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->integer('priceDiscount');
            $table->string('status')->default('unapproved');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('promocodes');
    }
}
