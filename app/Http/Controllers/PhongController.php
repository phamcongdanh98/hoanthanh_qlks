<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\Tang;
use App\LoaiPhong;
use App\AnhPhong;
use App\DatPhong;

class PhongController extends Controller
{
    function __construct()
    {    
        $loaiphong = LoaiPhong::all();
        $tang = Tang::all();
        view()->share('loaiphong',$loaiphong);
        view()->share('tang',$tang);
    }

    public function getDanhsach(Request $request)
    {
    	$phong=Phong::all();
        $date1 = getDate();
        $date = date('yy-m-d',time());
        foreach($phong as $p){
            $sum = 0;
            $trong = DatPhong::where('ngaynhanphong','<=',$date)
            ->where('ngaytraphong','>=',$date)
            ->where('idPhong',$p->id)
            ->get();
            //return response()->json($trong);
            foreach($trong as $t){
                $sum = $sum + $t->soluongphong;
            }
            $p['sophongtrong'] = $p->soluong - $sum;
        }
        $anhphong = AnhPhong::all();
        //return response()->json($phong);
    	return view('admin.pages.phong.danhsach',['phong'=>$phong],['anhphong'=>$anhphong]);
    }


    public function postThem(Request $request)
    {
        $this->validate($request,[
            'tenphong' => 'required|min:5|max:30',
            'soluong' => 'required',
            'dientich' => 'required',
            'giaphong' => 'required',
            'thongtin' => 'required',
        ],[
            'tenphong.required' => 'Bạn chưa nhập tên phòng',
            'tenphong.min' => 'Tên phòng tối thiếu phải có 5 ký tự',
            'tenphong.max' => 'Tên Phòng tối đa là 30 ký tự',
            'soluong.required' => 'Bạn chưa nhập số lượng phòng',
            'dientich.required' => 'Bạn chưa nhập diện tích phòng',
            'giaphong.required' => 'Bạn chưa nhập giá phòng',
            'thongtin.required' => 'Bạn chưa nhập thông tin phòng',
        ]);
    	$phong = new Phong;
        $phong->tenphong=$request->tenphong;
        $phong->idLoaiPhong=$request->loaiphong;
        $phong->idTang=$request->tang;
        $phong->soluong=$request->soluong;
        $phong->dientich=$request->dientich;
        $phong->giaphong=$request->giaphong;
        $phong->thongtin=$request->thongtin;

        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('phong')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhphong1",$anh_ten_moi);
            $phong->anhdaidien=$anh_ten_moi;

        }
        else
        {
            $phong->anhdaidien="";
        }

        $phong->save();
        $id_phong=$phong->id;

        if($request->hasFile('anh'))
    	{
    		$anh_array=$request->file('anh');
    		$array_len=count($anh_array);
    		for($i=0; $i<$array_len; $i++)
    		{
    			$duoi=$anh_array[$i]->getClientOriginalExtension();
    			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
    			{
    					return back()->with('msg','sai dinh dang file');
    			}
    			$anh_ten=$anh_array[$i]->getClientOriginalName();
    			$anh_ten_moi= rand(123,999)."_". $anh_ten;
    			$anh_array[$i]->move("anhphong2",$anh_ten_moi);

           	    $anh= new AnhPhong;
           	    $anh->anh=$anh_ten_moi;
           	    $anh->idphong=$id_phong;
           	    $anh->save();
    		}

    	}
    	else
	    {
	    	return redirect()->route('phong')->with('thongbao','Thêm thành công');
	    }

        return redirect()->route('phong')->with('thongbao','Thêm thành công');
         
    }
    public function postXoa(Request $request)
    {
        Phong::delphong($request->id);
    }
    
    public function postSua(Request $request)
    {
         $phong= Phong::find($request->id);
         $anh_cu=$phong->anhdaidien;
         $this->validate($request,[
            'tenphong' => 'required|min:5|max:30',
            'soluong' => 'required',
            'dientich' => 'required',
            'giaphong' => 'required',
            'thongtin' => 'required',
        ],[
            'tenphong.required' => 'Bạn chưa nhập tên phòng',
            'tenphong.min' => 'Tên phòng tối thiếu phải có 5 ký tự',
            'tenphong.max' => 'Tên Phòng tối đa là 30 ký tự',
            'soluong.required' => 'Bạn chưa nhập số lượng phòng',
            'dientich.required' => 'Bạn chưa nhập diện tích phòng',
            'giaphong.required' => 'Bạn chưa nhập giá phòng',
            'thongtin.required' => 'Bạn chưa nhập thông tin phòng',
        ]);
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('phong')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhphong1",$anh_ten_moi);
            $anh_daidien=$anh_ten_moi;

        }
        else
        {
           $anh_daidien=$anh_cu;
        }
        Phong::find($request->id)->update(['tenphong'=>$request->tenphong,'soluong'=>$request->soluong,'dientich'=>$request->dientich,'giaphong'=>$request->giaphong,'thongtin'=>$request->thongtin,'idLoaiPhong'=>$request->loaiphong,'idTang'=>$request->tang,'anhdaidien'=>$anh_daidien]);
        return redirect()->route('phong')->with('thongbao','Thêm Thành Công');    
    }
}
