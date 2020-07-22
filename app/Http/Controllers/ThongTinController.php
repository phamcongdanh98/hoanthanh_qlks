<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thongtin;
use App\GioiThieu;

class ThongTinController extends Controller
{
    public function getThongTin()
    {
    	$thongtin=thongtin::find(1);
    	return view('admin.pages.thongtinkhachsan.thongtin',['thongtin'=>$thongtin]);
    }
    public function suaThongTin(Request $request)
    {
    	 $this->validate($request,
        [
            'diachi'=> 'required|min:3|max:60',
            'sdt'=> 'required|min:10|max:11',
            'email'=> 'required',

        ],
        [
            'diachi.required'=>'Bạn chưa địa chỉ',
            'sdt.required'=>'Bạn chưa nhập sdt',
            'email.required'=>'Bạn chưa nhập email',

            'diachi.min'=>'Địa chỉ có đọ dài tự 10 đến 60 ký tự',
            'diachi.max'=>'Địa chỉ bài viết phải có đọ dài tự 3 đến 100 ký tự',
            'sdt.min'=>'Số điện thoại có từ 10 đến 11 chữ số',
            'sdt.max'=>'Số điện thoại có từ 10 đến 11 chữ số',
        ]);
    	  thongtin::find(1)->update(['diachi'=>$request->diachi,'sdt'=>$request->sdt,'email'=>$request->email]);
    	  return redirect()->route('thongtin')->with('thongbao','Sửa thành công'); 
    }

}
