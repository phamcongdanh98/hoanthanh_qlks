<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioiThieu extends Model
{
    protected $table="gioithieu";
    protected $fillable = ['tomtat','linkvideo'];
}
