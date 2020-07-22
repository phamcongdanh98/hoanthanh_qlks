<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Anhphong;
use App\Phong;
use App\DatPhong;

class LoaiPhong extends Model
{
    protected $table='loaiphong';
    protected $fillable = ['tenloai'];

    public function phong()
    {
    	return $this->hasMany('App\Phong','idLoaiPhong','id');
    }

    public static function delloaiphong($id){
        $phong2 = Phong::where('idLoaiPhong',$id)->get();
        foreach($phong2 as $list)
        {
            $anhphong2=AnhPhong::where('idPhong',$list->id)->delete();

        }
        foreach ($phong2 as $value) {
            DatPhong::where('idPhong',$value->id)->delete();
        }
        $phong3 = Phong::where('idLoaiPhong',$id)->delete();
    	loaiPhong::find($id)->delete();
    }
}
