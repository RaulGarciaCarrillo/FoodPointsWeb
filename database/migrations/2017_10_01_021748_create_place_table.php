<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('description')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->longText('image')->nullable(); // for blob
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place');
    }

}
