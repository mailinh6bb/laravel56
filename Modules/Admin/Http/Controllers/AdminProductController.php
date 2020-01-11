<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Product;
use App\Models\Category;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    // Sản Phẩm
    public function index(Request $request)
    {
        $product = Product::with('category:id,c_name');
        if ($request -> name) {
            $product -> where('pro_name', 'like', '%'.$request -> name.'%');
        }
        if ($request -> cate_id) {
         $product -> where('pro_category_id', $request -> cate_id);
     }
     $product = $product -> orderBy('id','DESC')->paginate(10);
     $category = $this->getCategories();
     $viewDate = [
        'product' => $product,
        'category' => $category
    ];
    return view('admin::product.index', $viewDate);
}
// Tạo và lưu Sản Phẩm
public function create(){
    $category = $this->getCategories();
    return view('admin::product.create', compact('category'));
}
public function store(RequestProduct $requestProduct){
    $this -> insertOrUpdate($requestProduct);
    return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm Mới Thành Công!']);
}
// Lấy và sửa Sản Phẩm
public function edit ($id){
    $product = Product::find($id);
    $category = $this->getCategories();
    return view('admin::product.edit', compact('product', 'category'));
}
public function update(RequestProduct $requestProduct, $id){
    $this -> insertOrUpdate($requestProduct, $id);
    return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Sửa Thành Công!']);;
}
public function getCategories(){
    return Category::all();
}
public function insertOrUpdate($requestProduct, $id=''){
    $product = new Product();
    if ($id) $product = Product::find($id);
    $product -> pro_name = $requestProduct -> pro_name;
    $product -> pro_slug = str_slug($requestProduct -> pro_name);
    $product -> pro_description = $requestProduct -> pro_description;
    $product -> pro_content = $requestProduct -> pro_content;
    $product -> pro_hot = $requestProduct -> pro_hot ? $requestProduct -> pro_hot : 0 ;
    $product -> pro_category_id =  $requestProduct -> pro_category_id;
    $product -> pro_price = $requestProduct -> pro_price;
    $product -> pro_sale = $requestProduct -> pro_sale;
    $product -> pro_number = $requestProduct -> pro_number;
    $product -> pro_description_seo = $requestProduct -> pro_description_seo ? $requestProduct -> pro_description_seo : $requestProduct -> pro_name;
    $product -> pro_title_seo = $requestProduct -> pro_title_seo ? $requestProduct -> pro_title_seo : $requestProduct -> pro_name;
    
    if ($requestProduct -> hasFile('pro_avatar')) {
        $file = upload_image('pro_avatar');
        if (isset($file['name'])) {
            $product -> pro_avatar = $file['name'];
        }
    }
    $product ->save();
}
public function action($action, $id){
   $product = Product::find($id);
   $message = '';
   if ($action) {
    switch ($action) {
        case 'delete':
        $product -> delete($id);
         $message = 'Xóa Thành Công';
        break;
        case 'active':
        $product -> pro_active = $product-> pro_active ? 0 : 1;
        $product -> save();
        break;
        case 'hot':
        $product -> pro_hot= $product -> pro_hot ? 0 : 1;
        $product -> save();
        break;
    }

}
return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => $message]);
}
}
