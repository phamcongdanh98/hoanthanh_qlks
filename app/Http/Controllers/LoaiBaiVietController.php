<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\LoaiBaiViet;
use App\BaiViet;

class LoaiBaiVietController extends Controller
{


    public function getDanhsach()
    {
    	$loaibaiviet= LoaiBaiViet::all();
    	return view('admin.pages.loaibaiviet.danhsach',['loaibaiviet'=>$loaibaiviet]);
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
        $tenkhongdau = strtolower(convert_vi_to_en($request->tenloai));
    	$loaibaiviet = loaibaiviet::create(['tenloai'=>$request->tenloai,'tenkhongdau'=>$tenkhongdau]);
    	return redirect()->route('loaibaiviet')->with('thongbao','Thêm thành công');
    }
    public function postXoa(Request $request)
    {
        
        LoaiBaiViet::delloaibv($request->id);
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
        $tenkhongdau = strtolower(convert_vi_to_en($request->tenloai));
    	loaibaiviet::find($request->id)->update(['tenloai'=>$request->tenloai,'tenkhongdau'=>$tenkhongdau]);
    	return redirect()->route('loaibaiviet')->with('thongbao','Sửa thành công');
    }

}
