<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table="khachhang";
    protected $fillable = [
        'ten',
        'cmnd',
        'sdt',
        'email'
    ];
    public function datphong()
    {
    	return $this->hasMany('App\DatPhong','idKhachHang','id');
    }
}
