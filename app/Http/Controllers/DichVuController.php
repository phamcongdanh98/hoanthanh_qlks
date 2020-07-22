<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DichVu;

class DichVuController extends Controller
{
     public function getDanhsach()
    {
    	$dichvu= dichvu::all();
    	return view('admin.pages.dichvu.danhsach',['dichvu'=>$dichvu]);
    }


    public function postThem(Request $request)
    {
        $this->validate($request,[
            'tendichvu' => 'required|min:5|max:30',
        ],[
            'tendichvu.required' => 'Bạn chưa nhập tiêu đề slide',
            'tendichvu.min' => 'Tên dịch vụ tối thiếu phải có 5 ký tự',
            'tendichvu.max' => 'Tên dịch vụ tối đa là 30 ký tự',
        ]);
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('dichvu')->with('loi','Bạn chọn sai định dạng ảnh');
            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhdichvu",$anh_ten_moi);
            $anh_dichvu=$anh_ten_moi;

        }
        else
        {
           return redirect()->route('dichvu')->with('loi','hình dịch vụ không được trống');
        }

        $dichvu = dichvu::create(['tendichvu'=>$request->tendichvu,'tinhtrang'=>$request->tinhtrang,'hinh'=>$anh_dichvu]);
        return redirect()->route('dichvu')->with('thongbao','Thêm Thành Công');
    }
    public function postXoa(Request $request)
    {
    	dichvu::deldichvu($request->id);
    }
    
    public function postSua(Request $request)
    {
         $dichvu= dichvu::find($request->id);
         $anh_cu=$dichvu->hinh;
        $this->validate($request,[
            'tendichvu' => 'required|min:5|max:30',
        ],[
            'tendichvu.required' => 'Bạn chưa nhập tiêu đề slide',
            'tendichvu.min' => 'Tên dịch vụ tối thiếu phải có 5 ký tự',
            'tendichvu.max' => 'Tên dịch vụ tối đa là 30 ký tự',
        ]);
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('dichvu')->with('loi','Bạn chọn sai định dạng ảnh');
            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhdichvu",$anh_ten_moi);
            $anh_dichvu=$anh_ten_moi;

        }
        else
        {
           $anh_dichvu=$anh_cu;
        }

        dichvu::find($request->id)->update(['tendichvu'=>$request->tendichvu,'hinh'=>$anh_dichvu]);
        return redirect()->route('dichvu')->with('thongbao','Sửa thành công');
    }
    public function TinhTrangDV(Request $request){
        dichvu::find($request->id)->update(['tinhtrang'=>$request->tinhtrang]);
    }
}
