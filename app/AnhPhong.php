<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnhPhong extends Model
{
    protected $table="anhphong";
    protected $fillable = ['anh','idPhong'];

    public function phong()
    {
    	return $this->belongsTo('App\Phong','idPhong','id');
    }
}
