<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , 50);
            $table->float('price')->nullable();
            $table->integer('typephone_id')->unsigned();
            $table->string('image_url' , 100)->nullable();
            $table->timestamps();
            
            $table->foreign('typephone_id')->references('id')->on('typephone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone');
    }
}
