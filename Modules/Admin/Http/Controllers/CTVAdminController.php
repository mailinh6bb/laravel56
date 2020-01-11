<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestAdmin;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use DB;

class CTVAdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return view('admin::ctvadmin.admin_ctv.index', compact('admin'));
    }
    public function create()
    {

        $roles = Role::orderBy('id', 'DESC')->get();
        return view('admin::ctvadmin.admin_ctv.create', compact('roles'));
    }
    public function store(Request $request)
    {
      $admin = new Admin();
      $admin -> name = $request -> name;
      $admin -> password = bcrypt($request -> password);
      $admin -> email = $request -> email;
      $admin -> phone = $request -> phone;
      $admin -> avatar = $request -> avatar;
      $admin->save();

      $admin->attachRoles($request -> roles);
      return redirect()->route('admin.get.list.ctv')->with(['message' => 'Thêm mới dữ liệu thành công']);
  }
  public function edit($id)
  {
    $admin = Admin::find($id);
    $roles = Role::orderBy('id', 'DESC')->get();
    $admin_roles = [];
    foreach ($admin->roles as $key => $role) {
        $admin_roles[] = $role->id;
    }
    return view('admin::ctvadmin.admin_ctv.edit', compact('admin', 'roles', 'admin_roles'));
}

public function update(Request $request, $id)
{
    $admin = admin::find($id);
    if (!empty($request->password)) {
        $admin->password = bcrypt($request->password);
    }
    else {
        $admin = array_except($admin, array('password'));
    }
    $admin -> name = $request -> name;
    $admin -> email = $request -> email ? $request -> email : $admin -> email;
    $admin -> phone = $request -> phone;
    $admin -> avatar = $request -> avatar;
    $admin->save(); 
    DB::table('admin_role')->where('admin_id', $id)->delete();
    foreach ($request->roles as $key => $role) {
        $admin->attachRole($role);
    }
    return redirect()->route('admin.get.list.ctv')->with(['flash_level' => 'success','flash_message' => 'Cập nhập dữ liệu thành công']);
}
public function action($action,$id){
    $admin = Admin::find($id);
    $message='';
    switch ($action) {
        case 'delete':
        $admin -> delete();
        DB::table('admin_role')->where('admin_id', $id)->delete();
        $message = 'Xóa dữ liệu thành công.';
        break;
    }
    return redirect()->route('admin.get.list.ctv')->with(['flash_level' => 'success','flash_message' => $message]);
}
}
