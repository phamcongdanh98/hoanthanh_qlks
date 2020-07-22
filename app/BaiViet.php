<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table="baiviet";
    protected $fillable = [
    	'tieude',
        'tenkhongdau',
        'luotxem',
    	'tomtat',
    	'noidung',
    	'hinh',
    	'idLoaiBaiViet',
    ];

    public function loaibaiviet()
    {
    	return $this->belongsTo('App\LoaiBaiViet','idLoaiBaiViet','id');
    }

    public static function delbaiviet($id){
        BaiViet::find($id)->delete();
    }
}
