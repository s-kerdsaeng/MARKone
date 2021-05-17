<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBillastable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billas', function (Blueprint $table) {
            $table->string('trucks_name')->after('trucks_id');
            $table->string('mechanics_name')->after('mechanics_id');
            $table->string('drivers_name')->after('drivers_id');
            $table->string('products_name')->after('products_id');
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
