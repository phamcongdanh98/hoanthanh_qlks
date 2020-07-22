<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table="slide";
    protected $fillable = [
        'tieude',
        'chuthich',
        'hinh',
        'tinhtrang',
    ];
    public static function delslide($id)
     {
    	Slide::find($id)->delete();
    }
}
