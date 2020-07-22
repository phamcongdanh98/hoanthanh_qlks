<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table="dichvu";
    protected $fillable = ['tendichvu','hinh','tinhtrang'];
    
    public static function deldichvu($id)
    {
    	dichvu::find($id)->delete();
    }
}
