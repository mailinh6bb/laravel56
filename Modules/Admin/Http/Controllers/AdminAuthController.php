<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
 
    public function getLogin()
    {
      return view('admin::auth.login');

  }
  public function postLogin(Request $request){
     $data = $request -> only('email', 'password');
     if (Auth::guard('admins')-> attempt($data) ){
        return redirect()->route('admin.home');
    }
    else{
        return redirect() -> back()->with(['thongbao' => 'Tài Khoản Bạn Không Đúng!']);
    }
}
public function getLogout(){
 Auth::guard('admins')->logout();
 return redirect()->route('admin.get.login');
}


}
