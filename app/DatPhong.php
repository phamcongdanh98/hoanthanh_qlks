<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatPhong extends Model
{
    protected $table="datphong";
    protected $fillable = [
        'ngaynhanphong',
        'ngaytraphong',
        'soluongphong',
        'check',
        'idPhong',
        'soluongkhach',
        'thanhtoan',
        'idKhachHang',
        'tonggia'
    ];

    public function phong()
    {
    	return $this->belongsTo('App\Phong','idPhong','id');
    }
    public function khachhang()
    {
    	return $this->belongsTo('App\KhachHang','idKhachHang','id');
    }
}
