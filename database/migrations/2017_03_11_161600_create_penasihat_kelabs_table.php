<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenasihatKelabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penasihat_kelabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('katalaluan');
            $table->string('namaPen');
            $table->timestamps();

            //foreign key
            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penasihat_kelabs');
    }
}
