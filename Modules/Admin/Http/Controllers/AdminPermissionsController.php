<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use DB;

class AdminPermissionsController extends Controller
{
    public function index()
    {
        $permissions= Permission::all();
        return view('admin::ctvadmin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('admin::ctvadmin.permissions.create');
    }
    public function store(Request $request)
    {
        $permissions = new Permission();
        $permissions -> name = $request -> name;
        $permissions -> display_name = $request -> display_name;
        $permissions->save();
        return redirect()->route('admin.get.list.permission')->with(['flash_level' => 'success', 'flash_message' => 'Thêm mới dữ liệu thành công']);
    }
    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('admin::ctvadmin.permissions.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        $permissions = Permission::find($id);
        $permissions -> name = $request -> name;
        $permissions -> display_name = $request -> display_name;
        $permissions->save(); 
        return redirect()->route('admin.get.list.permission')->with(['flash_level' => 'success','flash_message' => 'Cập nhập dữ liệu thành công']);
    }
    public function action($action,$id){
     $permissions = Permission::find($id);
     $message='';
     switch ($action) {
        case 'delete':
        $permissions->delete();
        $message = 'Xóa dữ liệu thành công.';
        break;
    }
    return redirect()->route('admin.get.list.permission')->with(['flash_level' => 'success','flash_message' => $message]);
}
}
