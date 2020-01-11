<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Log;
class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    
 // Index
    public function index()
    {
      $category = Category::select('id', 'c_name', 'c_title_seo', 'c_active', 'c_home')->get();
      return view('admin::category.index', ['category' => $category]);
    }

 // Thêm và Lưu Thông Tin
    public function create(){
      return view('admin::category.create');
    }
    public function store(RequestCategory $requestCategory){
     $this -> insertOrUpdate($requestCategory);
     return redirect()-> back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm Mới Thành Công!']);
   }

   // Lấy và Sửa Thông Tin
   public function edit($id){
    $category = Category::find($id);
    return view('admin::category.edit', ['category' => $category]);
  }
  public function update(RequestCategory $requestCategory, $id){
    $this -> insertOrUpdate($requestCategory, $id);
    return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Sửa Thành Công!']);
  }
    // Function Tối Ưu Code 
  public function insertOrUpdate($requestCategory, $id=''){
    $code = 0;
    
    $category = new Category();
    if ($id) {
     $category = Category::find($id);
   }
   $category -> c_name = $requestCategory -> name;
   $category -> c_slug = str_slug($requestCategory->name);
   $category -> c_icon = str_slug($requestCategory -> icon);
   $category -> c_title_seo = $requestCategory -> c_title_seo ? $requestCategory -> c_title_seo : $requestCategory-> name;
   $category -> c_description_seo = $requestCategory -> c_description_seo;
   $category -> save();
 }

 public function action($action, $id){
  $category = Category::find($id);
  $message = '';
  if ($action) {
    switch ($action) {
      case 'delete':
      $category -> delete($id);
      $message = 'Xóa Dữ Liệu Thành Công';
      break;
      case 'active':
      $category -> c_active = $category-> c_active ? 0 : 1;
      $category -> save();
      break;
      case 'home':
      $category -> c_home = $category-> c_home ? 0 : 1;
      $category -> save();
      break;
    }
  }
  return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => $message]);
}
}
