<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnhKhachSan extends Model
{
   protected $table="anhkhachsan";
   protected $fillable = [
        'hinh',
        'tinhtrang',
    ];
   public static function delanhks($id)
   {
    	anhkhachsan::find($id)->delete();
   }
}
