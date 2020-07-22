<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Cache;
use Sentinel;
use Mail;
use Reminder;
use Carbon\Carbon;
class UserController extends Controller
{
     public function getDanhsach()
    {
    	$user= user::all();
    	return view('admin.pages.user.danhsach',['user'=>$user]);
    }
    public function postThem(Request $request)
    {
    	$this->validate($request,[
            'name'=>'required|min:3',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Ban chua nhap ten ',
            'name.min'=>'Ban nhap it hon 3 ky tu ',

            'password.required'=>'Ban chua nhap password ',
            'password.min'=>'Ban nhap it hon 3 ky tu ',
            'password.max'=>'Ban qua 32 ky tu ',

            'passwordAgain.required'=>'ban chua nhap lai passsword ',
            'passwordAgain.same'=>'ban nhap khong khop password '

        ]);
         $password = bcrypt($request->password);
          user::create([
                'email'=>$request->email,
                'name'=>$request->name,
                'password'=>$password,
                'quyen'=>$request->quyen
            ]);
          return redirect()->route('user')->with('thongbao','Thêm thành công');
    }

     public function postXoa(Request $request)
    {
        user::deluser($request->id);     
    }
    public function postsua(Request $request)
    {
    	// $this->validate($request,[
     //        'name'=>'required|min:3',
     //        'email'=>'required|email|unique:users,email',
     //        'password'=>'required|min:3|max:32',
     //        'passwordAgain'=>'required|same:password'
     //    ],
     //    [
     //        'name.required'=>'Ban chua nhap ten ',
     //        'name.min'=>'Ban nhap it hon 3 ky tu ',

     //        'email.required'=>'Ban chua nhap email ',
     //        'email.same'=>'Ban chua nhap dung dinh dang email ',
     //        'email.unique'=>'Email da ton tai ',


     //        'password.required'=>'Ban chua nhap password ',
     //        'password.min'=>'Ban nhap it hon 3 ky tu ',
     //        'password.max'=>'Ban qua 32 ky tu ',

     //        'passwordAgain.required'=>'ban chua nhap lai passsword ',
     //        'passwordAgain.same'=>'ban nhap khong khop password '

     //    ]);
        $user = user::find($request->id)->update([
            'name'=>$request->name,
            'quyen'=>$request->quyen1,
        ]);
        return redirect()->route('user')->with('thongbao','Đã chỉnh sửa thành công');
    }
    public function getdangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postdangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'


        ],[
            'email.required'=>'Ban chua nhap email ',
            'password.required'=>'Ban chua nhap password ',
            'password.min'=>'Ban nhap it hon 3 ky tu ',
            'password.max'=>'Ban qua 32 ky tu '

        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if(Auth::user()->quyen == 1){
                return redirect()->route('thongke');
            }
            return redirect()->route('danhsachdp');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Email hoặc PassWord sai');
        }

    }
     public function getdangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }
    public function getChangePass(){
        return view('admin.pages.user.changepassword');
    }

    public function changePassword(Request $request){
        $email = Auth::user()->email;
        $id = Auth::user()->id;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $this->validate($request,[
                'newpass' => 'required|min:8|max:20',
            ],[
                'newpass.required' => 'Bạn chưa nhập mật khẩu mới',
                'newpass.min' => 'Mật khẩu cần tối thiểu 8 ký tự',
                'newpass.max' => 'Mật khẩu chứa tối đa 20 ký tự'
            ]);
            if($request->newpass != $request->newpass2){
                return redirect()->back()->with('status','Mật khẩu không khớp');
            }
            else{
                $pass = bcrypt($request->newpass);
                user::find($id)->update(['password'=>$pass]);
                Auth::attempt(['email'=>$email,'password'=>$pass]);
                return redirect()->back()->with('thongbao','Đã thay đổi mật khẩu thành công.');
            }
        }else {
            return redirect()->back()->with('status', 'Mật khẩu cũ không chính xác');
        }
    }
    public function getFormResetPasswork()
    {
        return view('admin.resetpasswork');
    }
    public function postFormResetPasswork(Request $request)
    {
        $email=$request->email;
        $checkUser=user::where('email',$email)->first();

        if(!$checkUser)
        {
            return redirect()->back()->with('loi', 'Email khong tin tai');
        }

        $code=bcrypt(md5(time().$email));
        $checkUser->remember_token=$code;
        $checkUser->save();

        $to_name = "Khách sạn One Night";
        $to_email = $request->email;
        $url=route('resetpass',['code'=>$checkUser->code,'email'=>$email]);
        $data =[
            'route'=>$url
        ];             
        Mail::send('nguoidung.sendmail.send_mail_passwork',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)->subject('Cảm ơn đã liên hệ');
        $message->from($to_email,$to_name);
        });

        return redirect()->back()->with('thanhcong','Hãy vào email của bạn');
    }
    public function ResetPasswork(Request $request)
    {
        $code=$request->code;
        $email=$request->email;     
    }
}
