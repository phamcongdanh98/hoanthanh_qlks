<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiPhong;

class LoaiPhongController extends Controller
{
     public function getDanhsach()
    {
    	$loaiphong= LoaiPhong::all();
    	return view('admin.pages.loaiphong.danhsach',['loaiphong'=>$loaiphong]);
    }


    public function postThem(Request $request)
    {

        $this->validate($request,
        [
            'tenloai'=> 'required|min:3|max:100'

        ],
        [
            'tenloai.required'=>'Bạn chưa nhập tên loại bài viết',

            'tenloai.min'=>'Tên loại bài viết phải có đọ dài tự 3 đến 100 ký tự',
            'tenloai.max'=>'Tên loại bài viết phải có đọ dài tự 3 đến 100 ký tự',
        ]);

    	$loaiphong = LoaiPhong::create(['tenloai'=>$request->tenloai]);
    	return redirect()->route('loaiphong')->with('thongbao','Thêm thành công');      
    }
    public function postXoa(Request $request)
    {
        LoaiPhong::delloaiphong($request->id);     
    }
    
    public function postSua(Request $request)
    {
    	$this->validate($request,
        [
            'tenloai'=> 'required|min:3|max:100'

        ],
        [
            'tenloai.required'=>'Bạn chưa nhập tên loại bài viết',

            'tenloai.min'=>'Tên loại bài viết phải có đọ dài tự 3 đến 100 ký tự',
            'tenloai.max'=>'Tên loại bài viết phải có đọ dài tự 3 đến 100 ký tự',
        ]);

    	LoaiPhong::find($request->id)->update(['tenloai'=>$request->tenloai]);
    	return redirect()->route('loaiphong')->with('thongbao','Sửa thành công');       
    }
}
