<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
class ForgotPasswordController extends FrontendController
{
	public function getPassword(){
		return view('auth.passwords.email');
	}
	// lấy email và gởi thông tin về email
	public function postPassword(Request $request){
		$email = $request -> email;
		$checkUser = User::where('email', $email)-> first();
		if (!$checkUser) {
			return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Email không tồn tại']);
		}
		$code = bcrypt(md5(time().$email));
		$checkUser -> code = $code;
		$checkUser -> time_code = Carbon::now();
		$checkUser -> save();

		$url = route('get.reset.password', ['code' => $checkUser -> code,'email' => $checkUser -> email]);
		$data =[
			'route' => $url
		];
		Mail::send('mail.reset_password',array('data' => $data['route']), function ($message) use ($email, $data) {
			$message->to($email, 'User')->subject('Lấy Lại Mật Khẩu');

		});
		return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thành Công! Mã xác nhận đã gởi tới email của bạn!']);
	}
	// kiểm tra code and email
	public function getResetPassword(Request $request){
		$code = $request -> code;
		$email = $request -> email;
		$checkUser = User::where(['code' => $code, 'email' => $email])-> first();
		if (!$checkUser) {
			return redirect('')->with(['flash_level' => 'danger', 'flash_message' => 'Có Vấn Đề Với Đường Dẫn Của Bạn. Vui lòng gởi email lại.']);
		}
		return view('auth.passwords.reset', compact('email'));
	}
	public function postResetPassword(Request $request){
		if ($request -> password) {
			$this -> validate($request, [
				'password' => 'required|min:6|max:32',
				'rePassword' => 'required|same:password',
			], [

				'password.required' => 'Bạn chưa nhập Password',
				'password.min' => 'Mật khẩu phải có từ 6-32 ký tự',
				'password.max' => 'Mật khẩu phải có từ 6-32 ký tự',
				'rePassword.required' => 'Bạn nhập lại Mật Khẩu',
				'rePassword.same' => 'Mật khẩu không trùng nhau',
			]);
			$code = $request -> code;
			$email = $request -> email;
			$checkUser = User::where(['code' => $code, 'email' => $email])-> first();
			if (!$checkUser) {
				return redirect('')->with(['flash_level' => 'danger', 'flash_message' => 'Có Vấn Đề Với Đường Dẫn Của Bạn. Vui lòng gởi email lại.']);
			}
			$checkUser -> password = bcrypt($request -> password);
			$checkUser -> save();
			return redirect()->route('get.login')->with(['flash_level' => 'success', 'flash_message' => 'Mật khẩu đã đổi thành công! Vui lòng đăng nhập lại']);
		}
		
	}

}
