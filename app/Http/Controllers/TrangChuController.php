<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\LoaiPhong;
use App\LienHe;
use App\Slide;
use App\Phong;
use App\AnhPhong;
use App\Tang;
use App\KhachHang;
use App\DatPhong;
use App\ThongTin;
use App\GioiThieu;
use App\AnhKhachSan;
use App\LoaiBaiViet;
use App\BaiViet;
use App\DichVu;
use Mail;
use Session;


class TrangChuController extends Controller
{
	public function __construct()
	{
        $baiviet1=baiviet::orderBy('id','DESC')->take(8)->get();
		$loaiphong=LoaiPhong::all();
    	$loaibaiviet=LoaiBaiViet::all();
        $tang=tang::all();
        $thongtin=thongtin::find(1);
        $gioithieu=gioithieu::find(1);
        $slide=Slide::where('tinhtrang','=','Hiển Thị')->take(5)->get();
        $dichvu=dichvu::where('tinhtrang','=','Hiển Thị')->get();
        $anhkhachsan=anhkhachsan::where('tinhtrang','=','Hiển Thị')->take(8)->get();
        $phong=Phong::orderBy('id','DESC')->take(6)->get();
		view()->share('loaiphong',$loaiphong);
        view()->share('loaibaiviet',$loaibaiviet);
        view()->share('slide',$slide);
        view()->share('dichvu',$dichvu);
        view()->share('phong',$phong);
        view()->share('tang',$tang);
        view()->share('thongtin',$thongtin);
        view()->share('gioithieu',$gioithieu);
        view()->share('anhkhachsan',$anhkhachsan);
        view()->share('baiviet1',$baiviet1);
	}
    public function viewTrangChu()
    {
    	return view('nguoidung.pages.trangchu');
    }
    public function viewLoaiPhong($id)
    {
        $loaiphong1=loaiphong::find($id);
        $phong1=phong::orderBy('id','DESC')->where('idloaiphong',$id)->get();
        return view('nguoidung.pages.loaiphong',['loaiphong1'=>$loaiphong1,'phong1'=>$phong1]);
    }
    public function viewPhong($id)
    {
        $phong1=phong::find($id);
        $phong2=phong::orderBy('id','DESC')->where('id','!=',$id)->get();
        $anhphong=anhphong::orderBy('id','DESC')->where('idPhong',$id)->get();
        return view('nguoidung.pages.phong',['phong1'=>$phong1,'anhphong'=>$anhphong,'phong2'=>$phong2]);
    }
    public function viewDichVu()
    {
        return view('nguoidung.pages.dichvu');
    }
    public function viewLienHe()
    {
    	return view('nguoidung.pages.lienhe');
    }
    public function viewGioiThieu()
    {
        return view('nguoidung.pages.gioithieu');
    }
    public function themLienHe(Request $request)
    {

        $lienhe = new LienHe;
        $lienhe->ten=$request->ten;
        $lienhe->sdt=$request->sdt;
        $lienhe->email=$request->email;
        $lienhe->loinhan=$request->loinhan;
        $lienhe->check='0';
        $lienhe->save();

        $to_name = "Khách sạn One Night";
        $to_email = $request->email;
        $noidung= $lienhe->loinhan;
        $ten=$lienhe->ten;
        $data = array("name"=>$ten,"body"=>$noidung);             
        Mail::send('nguoidung.sendmail.send_mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)->subject('Cảm ơn đã liên hệ');
        $message->from($to_email,$to_name);

    });
        return redirect()->route('viewlienhe')->with('thongbao','Cảm ơn bạn đã liên hệ');
    }
     public function DatPhong()
    {
        $khachhang = KhachHang::create(['ten'=>Session::get('name'),'email'=>Session::get('email'),'cmnd'=>Session::get('cmnd'),'sdt'=>Session::get('sdt')]);
        $datphong = datphong::join('phong','phong.id','datphong.idPhong')
        ->where('datphong.idPhong',Session::get('idPhong'))
        ->whereBetween('datphong.ngaynhanphong',[Session::get('ngaynhanphong'),Session::get('ngaytraphong')])
        ->orWhereBetween('datphong.ngaytraphong',[Session::get('ngaynhanphong'),Session::get('ngaytraphong')])
        ->get();
        $phong = phong::find(Session::get('idPhong'));
        $dadat = 0;
        foreach($datphong as $list){
            $dadat = $dadat + $list->soluongphong;
        }
        $phong = phong::find(Session::get('idPhong'));
        $chuadat = $phong->soluong - $dadat;
        //return Session::get('soluongphong');
        if(Session('soluongphong') > $chuadat){
            return redirect()->route('trangchu');
        }
        else{
            DatPhong::create(['ngaynhanphong'=>Session::get('ngaynhanphong'),'ngaytraphong'=>Session::get('ngaytraphong'),'soluongphong'=>Session::get('soluongphong'),'soluongkhach'=>Session::get('soluongkhach'),'check'=>0,'thanhtoan'=>0,'idPhong'=>Session::get('idPhong'),'idKhachHang'=>$khachhang->id,'tonggia'=>Session::get('tonggia')]);

            $to_name = "Khách sạn One Night";
            $to_email = Session::get('email');
            $ten=Session::get('name');
            $ngaynhanphong=Session::get('ngaynhanphong');
            $ngaytraphong=Session::get('ngaytraphong');
            $soluongphong=Session::get('soluongphong');
            $soluongkhach=Session::get('soluongkhach');
            $tonggia=Session::get('tonggia');
            $tenphong = $phong->tenphong;
            $ngaydat = date('d-m-yy G:i',strtotime($khachhang->created_at)+7*60*60);
            $data = array("ten"=>$ten,"ngaynhanphong"=>$ngaynhanphong,"ngaytraphong"=>$ngaytraphong,"soluongphong"=>$soluongphong,"soluongkhach"=>$soluongkhach,"tonggia"=>$tonggia, 'tenphong'=>$tenphong, 'ngaydat'=>$ngaydat);             
            Mail::send('nguoidung.sendmail.send_datphong',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Đơn đặt phòng');
            $message->from($to_email,$to_name);
            });
            Session::forget('ngaytraphong');
            Session::forget('ngaynhanphong');
            Session::forget('idPhong');
            Session::forget('name');
            Session::forget('email');
            Session::forget('sdt');
            Session::forget('cmnd');
            Session::forget('tonggia');
            Session::forget('soluongkhach');
            Session::forget('soluongphong');
            Session::forget('phongtrong');
            return view('nguoidung.pages.hoanthanh');
        }

    }
    public function getCheckOut(Request $request){
        $this->validate($request,[
            'ten' => 'required|min:5|max:30',
            'sdt' => 'required',
            'cmnd' => 'required',
            'email' => 'required',
            'soluongkhach' => 'required',
        ],[
            'ten.required' => 'Bạn chưa nhập tên',
            'ten.min' => 'Tên của bạn quá ngắn',
            'ten.max' => 'Tên của bàn quá dài',
            'sdt.required' => 'Số diện thoại phải 10 chữ số',
            'sdt.min' => 'Tên của bạn quá ngắn',
            'sdt.max' => 'Tên của bàn quá dài',
            'cmnd.required' => 'Bạn chưa nhập chứng minh nhân dân',
            'email.required' => 'Bạn chưa nhập email',
            'soluongkhach.required' => 'Bạn chưa nhập số lượng khách',
        ]);

        $checkout = phong::join('loaiphong','phong.idLoaiPhong','loaiphong.id')
                    ->join('tang','phong.idTang','tang.id')
                    ->where('phong.id',$request->id)->firstOrFail();
        $tonggia = Session::get('tonggia');
        Session::put('name',$request->ten);
        Session::put('email',$request->email);
        Session::put('cmnd',$request->cmnd);
        Session::put('sdt',$request->sdt);
        Session::put('soluongphong',$request->soluongphong);
        Session::put('soluongkhach',$request->soluongkhach);
        Session::put('idPhong',$request->id);
        $checkout['ten'] = $request->ten;
        $checkout['soluongphong'] = $request->soluongphong;
        $checkout['email'] = $request->email;
        $checkout['sdt'] = $request->sdt;
        $checkout['cmnd'] = $request->cmnd;
        $checkout['soluongkhach'] = $request->soluongkhach;
        $checkout['ngaynhanphong'] = Session::get('ngaynhanphong');
        $checkout['ngaytraphong'] = Session::get('ngaytraphong');
        //Session::forget('tonggia');
        return view('nguoidung.pages.datphong',['checkout'=>$checkout,'tonggia'=>$tonggia]);
        //return response()->json($checkout);
    }
    public function getTimKiem(Request $request){
        $this->validate($request,[
            'ngaynhanphong' => 'required',
            'ngaytraphong' => 'required',
        ],[
            'ngaynhanphong.required' => 'Bạn chưa nhập ngày nhận phòng',
            'ngaytraphong.required' => 'Bạn chưa nhập ngày trả phòng',
        ]);

        $datphong = datphong::join('phong','phong.id','datphong.idPhong')
        ->where('datphong.idPhong',$request->id)
        ->where('datphong.check','!=',2)
        ->whereBetween('datphong.ngaynhanphong',[$request->ngaynhanphong,$request->ngaytraphong])
        ->orWhereBetween('datphong.ngaytraphong',[$request->ngaynhanphong,$request->ngaytraphong])
        ->get();
        $dadat = 0;
        foreach($datphong as $list){
            $dadat = $dadat + $list->soluongphong;
        }
        $phong = phong::find($request->id);
        $chuadat = $phong->soluong - $dadat;
        $date1 = date($request->ngaynhanphong);
        $date2 = date($request->ngaytraphong);
       
                    
        $days = (strtotime($date2) - strtotime($date1)) / (60 * 60 * 24)+1;
        $tonggia = $phong->giaphong*$days;
        Session::put('tonggia',$tonggia);
        Session::put('ngaynhanphong',$request->ngaynhanphong);
        Session::put('ngaytraphong',$request->ngaytraphong);
        Session::put('phongtrong',$chuadat);
        return view('nguoidung.pages.timkiem',['chuadat'=>$chuadat,'phong'=>$phong,'ngaynhan'=>$request->ngaynhanphong,'ngaytra'=>$request->ngaytraphong,'tonggia'=>$tonggia]);
    }
    public function viewLoaiBaiViet($tenloai)
    {
        $id = getid($tenloai);
        $loaibaiviet = loaibaiviet::find($id);
        $baiviet=baiviet::orderBy('id','DESC')->where('idLoaiBaiViet',$id)->paginate(6);
        return view('nguoidung.pages.loaibaiviet',['baiviet'=>$baiviet]);
    }
     public function viewBaiViet($tieude){
        $id = getid($tieude);
        $baiviet = baiviet::find($id);
        $luotxem = $baiviet->luotxem;
        baiviet::find($id)->update(['luotxem'=>$luotxem+1]);
        $baivietkhac = baiviet::where('id','!=',$id)->orderBy('created_at','desc')->take(5)->get();
        return view('nguoidung.pages.baiviet',['baiviet'=>$baiviet,'baivietkhac'=>$baivietkhac]);
    }
}
