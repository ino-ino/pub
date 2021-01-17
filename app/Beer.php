<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    static $sharpness = [
        1,2,3,4,5
        ];
    
    static $body =[
        1,2,3,4,5
        ];
    
    static $aroma = [
        1,2,3,4,5
        ];
    
    static $flavor = [
        1,2,3,4,5
        ];
    
    static $throat = [
        1,2,3,4,5
        ];
}
// Beerクラスのstatic変数を定義したのかな？
// ＄がついてるのがstatic変数　インスタンスごとに変わらないもの
