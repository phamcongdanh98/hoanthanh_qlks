<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiPhong;
use App\Anhphong;

class Phong extends Model
{
    protected $table="phong";
    protected $fillable = [
        'tenphong',
        'anhdaidien',
        'thongtin',
        'soluong',
        'dientich',
        'giaphong',
        'idLoaiPhong',
        'idTang',
    ];

    public function loaiphong()
    {
    	return $this->belongsTo('App\LoaiPhong','idLoaiPhong','id');
    }

    public function tang()
    {
    	return $this->belongsTo('App\Tang','idTang','id');
    }

    public function anhphong()
    {
    	return $this->hasMany('App\AnhPhong','idPhong','id');
    }
    public function datphong()
    {
        return $this->hasMany('App\AnhPhong','idPhong','id');
    }

    public static function delphong($id)
    {
        $anhphong = AnhPhong::where('idPhong',$id)->delete();
        Phong::find($id)->delete();
    }


}
