<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class LoginController extends Controller
{

	public function getLogin(){
		return view('auth.login');
	}
	public function postLogin(Request $request){
		$login  = array(
			'email' => $request -> email,
			'password' => $request -> password,
		);
		if (Auth::attempt($login)) {
			if (Auth::user() -> active == 0) {
				Auth::logout();
				return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Bạn chưa kích hoạt tài khoản. Vui lòng kiểm tra <a href="https://mail.google.com/" title="">Email</a>!']);
			}
			return redirect()->route('home');
		}
		else{
			return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Tài Khoản hoặc Mật Khẩu không đúng!']);;
		}
	}
	public function getLogout(){
		Auth::logout();
		return redirect()->route('home');
	}
}
