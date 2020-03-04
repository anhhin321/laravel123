<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use DateTime;
use Mail;
use App\Usermodel;
use App\Mail\resetmail;
class ResetPasswordController extends Controller
{
   public function sendinfo(Request $req)
   {
       // dd($req->All());
    $email = $req->email;
    $check = User::where('email',$email)->first();
    if(!$check){
        return redirect()->back()->with(['thongbao'=>'Email chưa được đăng ký']);
    }
    $code = md5(time().$email);
    $check->code = $code;
    $check->timecode = new DateTime();
    $check->save();
    $name = $check->name;
    Mail::to($check->email)->send(new resetmail($code,$name));
    return redirect()->back()->with(['thongbao'=>'link lấy lại pass đã được gửi vào mail của bạn. ']);
   }
   public function resetpass($code){
    $code = User::where('code',$code)->first();
    return view('auth.passwords.reset', compact('code'));
   }
   public function checkdata(Request $req)
   {
       $this->validate($req,
        [
            'password'=>'required|min:8',
            'password2'=>'required|same:password'
        ],
        [
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 8 kí tự',
            'password2.same'=>'Mật khẩu không trùng nhau'
        ]
       );
       $token = $req->token;
       $update = User::where('code',$token)->first();
       $update->code = '';
       $update->password = Hash::make($req->password);
       $update->save();
       // dd($update);
       return redirect('/login')->with(['thongbao'=>'Đã đặt lại mật khẩu thành công']);
   }
}
