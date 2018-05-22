<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelimelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelimeler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enKelime');
            $table->string('trKelime');
            $table->integer('users_id');
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

        Schema::dropIfExists('kelimeler');
    }
}
