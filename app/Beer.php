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
        // value
        1,2,3,4,5
        ];
    
    /*
    static $body2 = [
        // key => value
        1 => 'よわよわ',
        2 => 'よわ',
        3 => 'ふつう',
        4 => 'つよ',
        5 => 'つよつよ'
    ];
    */
    
    // blade での書き方
    // <selecct name="body">
    // @foreach($body2 as $key => $value) 
        
    //     <option value="$key">$value</option>
        
    //基本データは変わらないもの、数字で登録が基本。表示を文字にしたい場合、連想配列が便利だよ、と。 
    // @endforeach
    // </select>
    
}