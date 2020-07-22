<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhsach()
    {
    	$slide= slide::all();
    	return view('admin.pages.slide.danhsach',['slide'=>$slide]);
    }


    public function postThem(Request $request)
    {
        $this->validate($request,[
            'tieude' => 'required|min:5|max:50',
            'chuthich' => 'required|min:5|max:50',
        ],[
            'tieude.required' => 'Bạn chưa nhập tiêu đề slide',
            'tieude.min' => 'Tiêu đề slide tối thiếu phải có 5 ký tự',
            'tieude.max' => 'Tiêu đề slide tối đa là 50 ký tự',
            'chuthich.required' => 'Bạn chưa nhập chú thích slide',
            'chuthich.min' => 'Chú thích slide tối thiếu phải có 5 ký tự',
            'chuthich.max' => 'Chú thích slide tối đa là 50 ký tự',
        ]);
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('slide')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhslide",$anh_ten_moi);
            $anh_slide=$anh_ten_moi;

        }
        else
        {
           $anh_slide="";
        }

        $slide = Slide::create(['tieude'=>$request->tieude,'chuthich'=>$request->chuthich,'tinhtrang'=>$request->tinhtrang,'hinh'=>$anh_slide]);
        return redirect()->route('slide')->with('thongbao','Thêm Thành Công');
    }
    public function postXoa(Request $request)
    {
    	slide::delslide($request->id);
    }
    
    public function postSua(Request $request)
    {
         $slide= slide::find($request->id);
         $anh_cu=$slide->hinh;
         $this->validate($request,[
            'tieude' => 'required|min:5|max:50',
            'chuthich' => 'required|min:5|max:50',
        ],[
            'tieude.required' => 'Bạn chưa nhập tiêu đề slide',
            'tieude.min' => 'Tiêu đề slide tối thiếu phải có 5 ký tự',
            'tieude.max' => 'Tiêu đề slide tối đa là 50 ký tự',
            'chuthich.required' => 'Bạn chưa nhập chú thích slide',
            'chuthich.min' => 'Chú thích slide tối thiếu phải có 5 ký tự',
            'chuthich.max' => 'Chú thích slide tối đa là 50 ký tự',
        ]);
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('slide')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhslide",$anh_ten_moi);
            $anh_slide=$anh_ten_moi;

        }
        else
        {
           $anh_slide=$anh_cu;
        }
        slide::find($request->id)->update(['tieude'=>$request->tieude,'chuthich'=>$request->chuthich,'hinh'=>$anh_slide]);
        return redirect()->route('slide')->with('thongbao','Thêm Thành Công');
    }
    public function TinhTrangSlide(Request $request){
        slide::find($request->id)->update(['tinhtrang'=>$request->tinhtrang]);
    }
}
