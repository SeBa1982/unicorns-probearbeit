<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->json('an_pos')->nullable();
            $table->date('bestelldatum')->nullable();
            $table->integer('article_id')->nullable();
            $table->string('article_desc')->nullable();
            $table->string('marke')->nullable();
            $table->json('menge')->nullable();
            $table->date('lieferdatum')->nullable();
            $table->string('bestellnummer')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
