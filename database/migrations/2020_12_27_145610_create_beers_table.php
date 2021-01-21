<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            // 
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("manufacturer")->nullable();
            $table->text("memo");
            $table->string("image_url")->nullable();
            
            $table->integer("sharpness");
            $table->integer("body");
            $table->integer("aroma");
            $table->integer("flavor");
            $table->integer("throat");
            
          
            
            $table->timestamps();
        });

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}

