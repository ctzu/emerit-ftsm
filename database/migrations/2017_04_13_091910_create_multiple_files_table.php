<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aktiviti_id')->unsigned();
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('aktiviti_id')->references('id')->on('aktivitis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiple_files');
    }
}
