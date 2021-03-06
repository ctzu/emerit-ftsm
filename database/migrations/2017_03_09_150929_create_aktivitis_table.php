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
            $table->integer('user_id')->index()->unsigned();
            $table->string('namaKelab');
            $table->string('namaAktiviti');
            $table->string('tempat');
            $table->date('tarikhAktiviti');
            $table->string('peringkat');
            $table->string('pencapaian');
            $table->string('jawatankuasa');
            $table->boolean('completed')->default(false);
            $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('kelab_id')->references('id')->on('kelabs')->onDelete('cascade');
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
