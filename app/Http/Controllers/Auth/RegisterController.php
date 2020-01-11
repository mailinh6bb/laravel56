<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Carbon\Carbon;
use Mail;

class RegisterController extends Controller
{

 public function getRegister()
 {
  return view('auth.register');
}
public function postRegister(Request $request){
  $user = New User();
  
  if ($request-> name) {
    $this -> validate($request, [
      'password' => 'required|min:6|max:32',
      'rePassword' => 'required|same:password',
      'email' => 'required|unique:users,email'
    ], [

      'password.required' => 'Bạn chưa nhập Password',
      'password.min' => 'Mật khẩu phải có từ 6-32 ký tự',
      'password.max' => 'Mật khẩu phải có từ 6-32 ký tự',
      'rePassword.required' => 'Bạn nhập lại Mật Khẩu',
      'rePassword.same' => 'Mật khẩu không trùng nhau',
      'email.unique' => 'Email đã tồn tại'
    ]);
    $user -> name = $request-> name;
    $user -> email = $request -> email;
    $user -> password = bcrypt($request -> password);
    $user -> phone = $request -> phone;
    $user -> remember_token = $request -> _token;
    $user ->save();
  }
  if ($user -> id) {
    $email = $user-> email;
    $code = bcrypt(md5(time().$email));
    $user -> code_active = $code;
    $user -> time_active = Carbon::now();
    $user ->save();
    $url = route('get.verify.account', ['id' => $user -> id,'code' => $user -> code_active]);
    $data =[
      'route' => $url
    ];
    Mail::send('mail.verify_account',array('data' => $data['route']), function ($message) use ($email, $data) {
      $message->to($email, 'User')->subject('Kích Hoạt Tài Khoản');
    });
    return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thành Công! Mã xác nhận đã gởi tới email của bạn!']);
  }

  return redirect()->back();
}
public function verifyAccount(Request $request){
  if ($request -> id) {
    $id = $request -> id;
    $code = $request -> code;
    $checkUser = User::where(['id' => $id, 'code_active' => $code])-> first();
    if (!$checkUser) {
      return redirect('')->with(['flash_level' => 'danger', 'flash_message' => 'Có Vấn Đề Với Đường Dẫn Của Bạn. Vui lòng gởi email lại.']);
    }
    $checkUser -> active = 1;
    $checkUser ->save();
    return redirect()->route('get.login')->with(['flash_level' => 'success', 'flash_message' => 'Kích Hoạt thành công! Vui lòng đăng nhập lại']);
  }
}

}
