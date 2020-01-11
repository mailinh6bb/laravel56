<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use App\Models\Transaction;
use App\User;

class UserController extends Controller
{
	public function index(){
		$transactions = Transaction::where('tr_user_id', get_data_user('web'));
		$listTransaction = $transactions;
		$transactions = $transactions-> addSelect('id', 'tr_total', 'tr_address', 'tr_phone', 'created_at', 'tr_status')-> paginate(10);


		$totalTransaction =$listTransaction->select('id')->count();
		$totalTransactionDone =$listTransaction -> where('tr_status',Transaction::STATIC_DONE)->select('id')->count();
		$totalTransactionDefault = $listTransaction ->where('tr_status', Transaction::STATIC_DEFAULT)->select('id')->count();

		$viewData = [
			'totalTransaction' => $totalTransaction,
			'totalTransactionDone' => $totalTransactionDone,
			'totalTransactionDefault' => $totalTransactionDefault,
			'transactions' => $transactions
		];
		return view('user.index', $viewData);
	}
	public function getInfo(){
		return view('user.info');
	}
	public function postInfo(Request $request){
		$user = User::find(get_data_user('web'));
		$user -> name = $request -> name;
		$user -> phone = $request -> phone;
		$user -> address = $request -> address;
		$user -> info = $request -> info;
		
		if($request -> changePass == "on"){
			// nếu có value="" thì ta dùng true/false
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
			$user -> password = bcrypt($request-> password);
		}

		$user -> save();
		return redirect()-> back()-> with(['flash_level' => 'success', 'flash_message' => 'Cập nhật Thành Công']);
	}
}
