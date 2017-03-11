<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();;
            $table->increments('id');
            $table->string('kategoriAktiviti')->unsigned();;
            $table->string('namaAktiviti');
            $table->string('namaKelab')->unsigned();;
            $table->string('jawatankuasa');
            $table->date(format)('tarikhAktiviti')->unsigned();;
            $table->string('tempat');
            $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktivitis');
    }
}
