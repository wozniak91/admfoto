<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationHasAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combination_has_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('combination_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            //$table->timestamps();
        });

        Schema::table('combination_has_attributes', function (Blueprint $table) {
            $table->foreign('combination_id')
            ->references('id')
            ->on('combinations');

            $table->foreign('attribute_id')
            ->references('id')
            ->on('attributes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combination_has_attributes');
    }
}
