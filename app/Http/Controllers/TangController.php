<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tang;

class TangController extends Controller
{
   
   public function getDanhsach()
    {
    	$tang= Tang::all();
    	return view('admin.pages.tang.danhsach',['tang'=>$tang]);
    }


    public function postThem(Request $request)
    {
    	$this->validate($request,
        [
            'sotang'=> 'required|min:5|max:10'

        ],
        [
            'sotang.required'=>'Bạn chưa nhập số tầng',

            'sotang.min'=>'Số tầng phải có đọ dài tự 5 đến 10 ký tự',
            'sotang.max'=>'Số tầng bài viết phải có đọ dài tự 5 đến 10 ký tự',
        ]);

    	$tang = Tang::create(['sotang'=>$request->sotang]);
    	return redirect()->route('tang');
       
    }
    public function postXoa(Request $request)
    {
        Tang::deltang($request->id);     
    }
    
    public function postSua(Request $request)
    {
      	$this->validate($request,
        [
            'sotang'=> 'required|min:5|max:10'

        ],
        [
            'sotang.required'=>'Bạn chưa nhập số tầng',

            'sotang.min'=>'Số tầng phải có đọ dài tự 5 đến 10 ký tự',
            'sotang.max'=>'Số tầng bài viết phải có đọ dài tự 5 đến 10 ký tự',
        ]);
      Tang::find($request->id)->update(['sotang'=>$request->sotang]);
      return redirect()->route('tang')->with('thongbao','Sửa thành công');  
    }

}
