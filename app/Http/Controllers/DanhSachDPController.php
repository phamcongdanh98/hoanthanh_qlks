<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Phong;
use App\DatPhong;
use App\KhachHang;
use App\LienHe;
use App\BaiViet;

class DanhSachDPController extends Controller
{
    function __construct()
    {    
        $khachhang = khachhang::all();
        $phong = phong::all();
        $datphong = datphong::all();
        view()->share('khachhang',$khachhang);
        view()->share('phong',$phong);
        view()->share('datphong',$datphong);
    }

    public function getDanhsach(Request $request)
    {
    	// $datphong=datphong::orderBy('id','DESC')->get();
    	// return view('admin.pages.danhsachdp.danhsach',['datphong'=>$datphong]);

        if(isset($request->sort) && $request->sort != -1){
            $datphong = datphong::where('check',$request->sort)
                ->orderBy('created_at','desc')->get();
        }
        else{
            $datphong = datphong::all();
        }
        return view('admin.pages.danhsachdp.danhsach',['datphong'=>$datphong,'sort'=>$request->sort]);

    }
    public function thanhtoan(Request $request){
        $datphong = datphong::find($request->id);
        $datphong->thanhtoan = $request->thanhtoan;
        $datphong->save();   
    }
    public function showchitiet($id)
    {
        $datphong=datphong::find($id);
        $phong=phong::find($datphong->idPhong);
        $khachhang=khachhang::find($datphong->idKhachHang);
        return view('admin.pages.danhsachdp.chitietdp',['datphong'=>$datphong,'phong'=>$phong,'khachhang'=>$khachhang]);
    }
    public function tiepnhan(Request $request){
        $datphong = datphong::find($request->id);
        $datphong->check = $request->status;
        $datphong->save();
    }
     public function cancel(Request $request){
        datphong::find($request->id)->update(['check'=>2]);
        return redirect()->back();
    }
     public function getThongKe(Request $request){
        // $phongchuaxacnhan=datphong::where('check','=',0)->count();
        // $lienhechuaxem = lienhe::where('check','=',0)->count();
        // $taikhoannguoidung = lienhe::where('check','=',0)->count();
        // $baiviet = baiviet::all()->count();
        // $phongdadat=datphong::where('check','=',1)->count();
        // $tongsophong=phong::selectRaw('SUM(soluong) as soluong')->first();
        // $doanhthu=datphong::where('thanhtoan','=',1)->selectRaw('SUM(tonggia) as tonggia')->first();
        // return view('admin.pages.thongke.thongke',['lienhechuaxem'=>$lienhechuaxem,'phongchuaxacnhan'=>$phongchuaxacnhan,'baiviet'=>$baiviet,'phongdadat'=>$phongdadat,'tongsophong'=>$tongsophong]);



        // if(isset($request->date)){
        //     $phongngay = datphong::whereDate('created_at',$request->date)->count();
        //     $phongthang = datphong::whereMonth('created_at',date('m',strtotime($request->date)))->count();
        //     $lienhengay = lienhe::whereDate('created_at',$request->date)->count();
        //     $lienhethang = lienhe::whereMonth('created_at',date('m',strtotime($request->date)))->count();
        //     $date = $request->date;
        // }else{
        //     $phongngay = datphong::whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        //     $phongthang= datphong::whereMonth('created_at',date('m',strtotime(Carbon::today()->toDateString())) )->count();
        //     $lienhengay = lienhe::whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        //     $lienhethang = lienhe::whereMonth('created_at',strtotime(Carbon::today()->toDateString()))->count();
        //     $date = Carbon::today()->toDateString();
        // }
        $phongdat = datphong::whereBetween('created_at',[$request->datetu,$request->dateden])->count();
        // return view('admin.pages.thongke.thongke',['phongngay'=>$phongngay,'phongthang'=>$phongthang,'lienhengay'=>$lienhengay,'lienhethang'=>$lienhethang,'date'=>$date]);
        $doanhthu=datphong::whereBetween('created_at',[$request->datetu,$request->dateden])->where('thanhtoan','=',1)->selectRaw('SUM(tonggia) as tonggia')->first();
        $lienhe = lienhe::whereBetween('created_at',[$request->datetu,$request->dateden])->count();
        $baiviet = baiviet::whereBetween('created_at',[$request->datetu,$request->dateden])->count();
        $tongsophong=phong::selectRaw('SUM(soluong) as soluong')->first();
        $datetu=$request->datetu;
        $dateden=$request->dateden;
        return view('admin.pages.thongke.thongke',['phongdat'=>$phongdat,'lienhe'=>$lienhe,'doanhthu'=>$doanhthu,'baiviet'=>$baiviet,'tongsophong'=>$tongsophong,'datetu'=>$datetu,'dateden'=>$dateden]);
    }
}
