<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTin extends Model
{
    protected $table="thongtin";
    protected $fillable = ['diachi','sdt','email'];
}
