<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnhKhachSan;

class AnhKhachSanController extends Controller
{
    public function getDanhsach()
    {
    	$anhkhachsan= anhkhachsan::all();
    	return view('admin.pages.anhkhachsan.danhsach',['anhkhachsan'=>$anhkhachsan]);
    }


    public function postThem(Request $request)
    {
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('anhkhachsan')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhkhachsan",$anh_ten_moi);
            $anh_khachsan=$anh_ten_moi;

        }
        else
        {
           return redirect()->route('anhkhachsan')->with('loi','Bạn chưa chọn file ảnh');
        }

        $anhkhachsan = anhkhachsan::create(['tinhtrang'=>$request->tinhtrang,'hinh'=>$anh_khachsan]);
        return redirect()->route('anhkhachsan')->with('thongbao','Thêm Thành Công');
    }
    public function postXoa(Request $request)
    {
    	anhkhachsan::delanhks($request->id);
    }
    
    public function postSua(Request $request)
    {
    	 $anhkhachsan= anhkhachsan::find($request->id);
         $anh_cu=$anhkhachsan->hinh;
         if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('anhkhachsan')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhkhachsan",$anh_ten_moi);
            $anh_khachsan=$anh_ten_moi;

        }
        else
        {
           $anh_khachsan=$anh_cu;
        }
        anhkhachsan::find($request->id)->update(['hinh'=>$anh_khachsan]);
        return redirect()->route('anhkhachsan')->with('thongbao','Sửa Thành Công');
        
    }
    public function TinhTrangAnhKS(Request $request)
    {
       anhkhachsan::find($request->id)->update(['tinhtrang'=>$request->tinhtrang]);
    }
}
