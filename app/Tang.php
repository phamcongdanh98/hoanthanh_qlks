<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tang extends Model
{
    protected $table="tang";
    protected $fillable = ['sotang'];

    public function phong()
    {
    	return $this->hasMany('App\Phong','idTang','id');
    }
     public static function deltang($id)
     {
    	Tang::find($id)->delete();
    }
}
