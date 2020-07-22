<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GioiTHieu;

class GioiThieuController extends Controller
{
    public function getGioiThieu()
    {
       $gioithieu=gioithieu::find(1);
       return view('admin.pages.thongtinkhachsan.gioithieu',['gioithieu'=>$gioithieu]);
    }
    public function suaGioiThieu(Request $request)
    {
         $this->validate($request,
        [
            'tomtat'=> 'required|min:30|max:200',
            'linkvideo'=> 'required|min:10|max:200',

        ],
        [
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'linkvideo.required'=>'Bạn chưa nhập link video',

            'tomtat.min'=>'Tóm tắt phải có đọ dài tự 30 đến 200 ký tự',
            'tomtat.max'=>'Tóm tắt phải có đọ dài tự 30 đến 200 ký tự',
            'linkvideo.min'=>'Link video phải có từ 10 đến 200 ký tự',
            'linkvideo.max'=>'Link video phải có từ 10 đến 200 ký tự',
        ]);
       gioithieu::find(1)->update(['tomtat'=>$request->tomtat,'linkvideo'=>$request->linkvideo]);
       return redirect()->route('gioithieu')->with('thongbao','Sửa thành công'); 
    }
}
