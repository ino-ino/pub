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
            $table->bigIncrements('id');
            $table->string("name")->nullable()->change();
            $table->string("manufacturer")->nullable()->change();
            $table->text("memo")->nullable()->change();
            $table->string("image_url");
            $table->integer("sharpness");
            $table->integer("body");
            $table->integer("aroma");
            $table->integer("flavor");
            $table->integer("throat");
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
        
        $table->string("name")->nullable(false)->change();
        $table->string("manufacturer")->nullable(false)->change();
        $table->string("memo")->nullable(false)->change();
        Schema::dropIfExists('beers');
    }
}
