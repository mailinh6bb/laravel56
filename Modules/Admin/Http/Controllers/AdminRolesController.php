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

class AdminRolesController extends Controller
{
    public function index()
    {
        $roles= Role::all();
        return view('admin::ctvadmin.roles.index', compact('roles'));
    }
    public function create()
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        $permissions = Permission::orderBy('id', 'DESC')-> get();
        return view('admin::ctvadmin.roles.create', compact('roles', 'permissions'));
    }
    public function store(Request $request)
    {
      $roles = new Role();
      $roles -> name = $request -> name;
      $roles -> display_name = $request -> display_name;
      $roles->save();

      $roles->attachPermissions($request -> permissions);
      return redirect()->route('admin.get.list.role')->with(['flash_level' => 'success', 'flash_message' => 'Thêm mới dữ liệu thành công']);
  }
  public function edit($id)
  {
    $roles = Role::find($id);
    $permissions = Permission::orderBy('id', 'DESC')->get();
    $permission_role = [];
    foreach ($roles-> permissions as $key => $permission) {
        $permission_role[] = $permission->id;
    }
    return view('admin::ctvadmin.roles.edit', compact('roles', 'permissions', 'permission_role'));
}

public function update(Request $request, $id)
{
    $roles = Role::find($id);
    $roles -> name = $request -> name;
    $roles -> display_name = $request -> display_name;
    $roles->save(); 
    DB::table('permission_role')->where('role_id', $id)->delete();
    foreach ($request->permissions as $key => $permission) {
        $roles->attachPermission($permission);
    }
    return redirect()->route('admin.get.list.role')->with(['flash_level' => 'success','flash_message' => 'Cập nhập dữ liệu thành công']);
}
public function action($action,$id){
    $role = Role::whereId($id); // dùng find trong model không đc nên ta dùng whereId
    $message='';
    switch ($action) {
        case 'delete':
        $role->delete();
        $message = 'Xóa dữ liệu thành công.';
        break;
    }
    return redirect()->route('admin.get.list.role')->with(['flash_level' => 'success','flash_message' => $message]);
}
}
