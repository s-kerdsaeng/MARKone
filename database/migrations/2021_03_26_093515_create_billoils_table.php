<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilloilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billoils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('billbs_id');
            $table->bigInteger('diesels_id');
            $table->string('diesels_name'); 
            $table->integer('products_price');
            $table->integer('products_amount'); 
            $table->integer('products_sum');
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
        Schema::dropIfExists('billoils');
    }
}
