<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBaiViet extends Model
{
    protected $table='loaibaiviet';
    protected $fillable = ['tenloai','tenkhongdau'];

    public function baiviet()
    {
    	return $this->hasMany('App\BaiViet','idLoaiBaiViet','id');
    }
    public static function delloaibv($id){
    	$baiviet = BaiViet::where('idLoaiBaiViet',$id)->delete();
    	loaibaiviet::find($id)->delete();
    }
}
