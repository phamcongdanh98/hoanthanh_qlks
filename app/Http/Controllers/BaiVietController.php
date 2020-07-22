<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\BaiViet;
use App\LoaiBaiViet;

class BaiVietController extends Controller
{
    function __construct()
    {    
        $baiviet = BaiViet::all();
        view()->share('baiviet',$baiviet);
        $loaibaiviet = LoaiBaiViet::all();
        view()->share('loaibaiviet',$loaibaiviet);
        view()->share('baiviet',$loaibaiviet);
    }

    public function getDanhsach()
    {
    	$baiviet=BaiViet::orderBy('id','DESC')->get();
    	return view('admin.pages.baiviet.danhsach',['baiviet'=>$baiviet]);
    }

    public function postThem(Request $request)
    {
         $this->validate($request,
        [
            'tieude'=> 'required|min:3|max:100',
            'tomtat'=> 'required|min:3|max:200',
            'noidung'=> 'required',

        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'tomtat.required'=>'Bạn chưa nhập tên tóm tắt',
            'noidung.required'=>'Bạn chưa nhập tên loại bài viết',

            'tieude.min'=>'Tiêu đề phải có đọ dài tự 3 đến 100 ký tự',
            'tieude.max'=>'Tiêu đề bài viết phải có đọ dài tự 3 đến 100 ký tự',
            'tomtat.min'=>'Tóm tắt bài viết phải có đọ dài tự 3 đến 200 ký tự',
            'tomtat.max'=>'Tóm tắt bài viết phải có đọ dài tự 3 đến 200 ký tự',
        ]);

        $baiviet = new BaiViet;
        $baiviet->tieude=$request->tieude;
        $baiviet->idLoaiBaiViet=$request->loaibaiviet;
        $baiviet->tomtat=$request->tomtat;
        $baiviet->noidung=$request->noidung;
        $tenkhongdau = strtolower(convert_vi_to_en($request->tieude));
        $baiviet->tenkhongdau=$tenkhongdau;
        $baiviet->luotxem='0';

        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('baiviet')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhbaiviet",$anh_ten_moi);
            $baiviet->hinh=$anh_ten_moi;

        }
        else
        {
            $baiviet->hinh="";
        }
        $baiviet->save();
        return redirect()->route('baiviet')->with('thongbao','Thêm thành công');
    }
    public function postXoa(Request $request)
    {
        BaiViet::delbaiviet($request->id);
    }
    
    public function postSua(Request $request)
    {

        $this->validate($request,
        [
            'tieude'=> 'required|min:3|max:100',
            'tomtat'=> 'required|min:3|max:200',
            'noidung'=> 'required',

        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'tomtat.required'=>'Bạn chưa nhập tên tóm tắt',
            'noidung.required'=>'Bạn chưa nhập tên loại bài viết',

            'tieude.min'=>'Tiêu đề phải có đọ dài tự 3 đến 100 ký tự',
            'tieude.max'=>'Tiêu đề bài viết phải có đọ dài tự 3 đến 100 ký tự',
            'tomtat.min'=>'Tóm tắt bài viết phải có đọ dài tự 3 đến 200 ký tự',
            'tomtat.max'=>'Tóm tắt bài viết phải có đọ dài tự 3 đến 200 ký tự',
        ]);
        $baiviet1=BaiViet::find($request->id);
        $anh_cu=$baiviet1->hinh;
        $baiviet1->tieude=$request->tieude;
        $baiviet1->tomtat=$request->tomtat;
        $baiviet1->noidung=$request->noidung;
        $tenkhongdau = strtolower(convert_vi_to_en($request->tieude));
        $baiviet1->tenkhongdau=$tenkhongdau;
        $baiviet1->luotxem='0';
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('baiviet')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhbaiviet",$anh_ten_moi);
            $baiviet1->hinh=$anh_ten_moi;

        }
        else
        {
            $baiviet1->hinh=$anh_cu;
        }
        $baiviet1->idLoaiBaiViet=$request->loaibaiviet;
        $baiviet1->save();
        return redirect()->route('baiviet')->with('thongbao','Sửa thành công');

    }

    public function getAjax(Request $request){
        $baiviet = BaiViet::findOrFail($request->id);
        $loaibaiviet = LoaiBaiViet::all();
        return view('admin.pages.baiviet.ajax',['baiviet'=>$baiviet,'loaibaiviet'=>$loaibaiviet]);
    }


}
