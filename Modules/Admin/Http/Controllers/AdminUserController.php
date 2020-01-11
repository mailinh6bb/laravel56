<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestUser;
use App\User;
use Log;
class AdminUserController extends Controller
{

	public function index()
	{
		$user = User::whereRaw(1);
		$user = $user ->orderBy('id', 'DESC')->paginate(10);
		$viewData = [
			'user' => $user
		];
		return view('admin::user.index', $viewData);
	}
	// Thêm và Lưu Thông Tin
	public function create(){
		return view('admin::user.create');
	}
	public function store(RequestUser $requestUser){
		$this -> insertOrUpdate($requestUser);
		return redirect()-> back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm Mới Thành Công!']);
	}

   // Lấy và Sửa Thông Tin
	public function edit($id){
		$user = User::find($id);
		return view('admin::user.edit', compact('user'));
	}
	public function update(RequestUser $requestUser, $id){
		$this -> insertOrUpdate($requestUser, $id);
		return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Sửa Thành Công!']);
	}
    // Function Tối Ưu Code 
	public function insertOrUpdate($requestUser, $id=''){
		$code = 0;
		try{
			$user = new User();
			if ($id) {
				$user = User::find($id);
			}
			$user -> name = $requestUser -> name;
			$user -> password =bcrypt($requestUser->password);
			$user -> email = $requestUser -> email ? $requestUser -> email : $user -> email;
			$user -> phone = $requestUser -> phone;
			$user -> address = $requestUser -> address;
			$user -> remember_token = $requestUser -> _token;

			// kiểm tra file có tồn tại - tại form nhớ thêm enctype="multipart/form-data"
			if ($requestUser -> hasFile('avatar')) {
				$file = upload_image('avatar');
				if (isset($file['name'])) {
					$user -> avatar = $file['name'];
				}
			}
			$user -> save();
		}
		catch(\Exception $exception){
			$code = 0;
			Log::error("[Error insertOrUpdate User]".$exception->getMessage());
		}
	}

	public function action($action, $id){
		$user = User::find($id);
		$message = '';
		if ($action) {
			switch ($action) {
				case 'delete':
				$user -> delete($id);
				$message = 'Xóa Dữ Liệu Thành Công';
				break;
			}
		}
		return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => $message]);
	}

}
