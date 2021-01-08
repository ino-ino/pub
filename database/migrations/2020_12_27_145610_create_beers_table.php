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
            $table->string("name");
            $table->string("manufacturer")->nullable();
            $table->text("memo");
            $table->string("image_url")->nullable();
            $table->integer("sharpness")->nullable();
            $table->integer("body")->nullable();
            $table->integer("aroma")->nullable();
            $table->integer("flavor")->nullable();
            $table->integer("throat")->nullable();
            $table->timestamps();
        });
        // null許可の方法はあっているはず。
        // 必須条件じゃなくする方法がnull許可で、許可したはずなのに未だエラー。うーん
    }

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
