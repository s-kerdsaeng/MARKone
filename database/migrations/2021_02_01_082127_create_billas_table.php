<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('datetime');
            $table->bigInteger('mechancs_id');
            $table->string('mechanics_name');
            $table->bigInteger('drivers_id');
            $table->string('drivers_name');
            $table->bigInteger('products_id');
            $table->string('products_name');
            $table->integer('total');
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
        Schema::dropIfExists('billas');
    }
}
