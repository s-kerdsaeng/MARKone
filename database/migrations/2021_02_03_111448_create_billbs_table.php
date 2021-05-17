<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billbs', function (Blueprint $table) {
            $table->id();
            $table->date('datetime');
            $table->bigInteger('trucks_id');
            $table->string('trucks_name');
            $table->bigInteger('mechancs_id');
            $table->string('mechanics_name');
            $table->bigInteger('drivers_id');
            $table->string('drivers_name');
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
        Schema::dropIfExists('billbs');
    }
}
