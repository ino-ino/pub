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
            $table->string("image_url")->nullable()->change();;
            $table->integer("sharpness")->nullable()->change();;
            $table->integer("body")->nullable()->change();;
            $table->integer("aroma")->nullable()->change();;
            $table->integer("flavor")->nullable()->change();;
            $table->integer("throat")->nullable()->change();;
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
        
        $table->string("name")->nullable(false)->change();
        $table->string("manufacturer")->nullable(false)->change();
        $table->string("memo")->nullable(false)->change();
        $table->string("image_url")->nullable(false)->change();
        $table->string("sharpness")->nullable(false)->change();
        $table->string("body")->nullable(false)->change();
        $table->string("aroma")->nullable(false)->change();
        $table->string("flavor")->nullable(false)->change();
        $table->string("throat")->nullable(false)->change();
        Schema::dropIfExists('beers');
    }
}
