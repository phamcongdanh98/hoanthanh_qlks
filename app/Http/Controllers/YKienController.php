<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LienHe;

class YKienController extends Controller
{
    public function getDanhsach(Request $request)
    {
    	// $lienhe=lienhe::orderBy('id','DESC')->get();
    	// return view('admin.pages.ykienlienhe.danhsach',['lienhe'=>$lienhe]);
        if(isset($request->sort) && $request->sort != -1){
            $lienhe = lienhe::where('check',$request->sort)
                ->orderBy('created_at','desc')->get();
        }
        else{
            $lienhe = lienhe::all();
        }
        return view('admin.pages.ykienlienhe.danhsach',['lienhe'=>$lienhe,'sort'=>$request->sort]);
    }
    public function showchitiet($id)
    {
        $lienhe=lienhe::find($id);
        return view('admin.pages.ykienlienhe.chitiet',['lienhe'=>$lienhe]);
    }
     public function tiepnhan(Request $request){
        $lienhe = lienhe::find($request->id);
        $lienhe->check = $request->status;
        $lienhe->save();
    }
}
