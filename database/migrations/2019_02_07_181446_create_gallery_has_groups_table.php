<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryHasGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_has_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->integer('images_group_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('gallery_has_groups', function (Blueprint $table) {

            $table->foreign('gallery_id')
            ->references('id')
            ->on('galleries');

            $table->foreign('images_group_id')
            ->references('id')
            ->on('images_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_has_groups');
    }
}
