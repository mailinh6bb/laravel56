<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Product;
use App\Models\Category;
class AdminWareHouseController extends controller
{

    public function index(request $request)
    {
        $product = Product::with('category:id,c_name');
        // tìm kiếm sản phẩm 
        if ($request -> name) {
            $product -> where('pro_name', 'like', '%'.$request -> name.'%');
        }
        if ($request -> cate_id) {
           $product -> where('pro_category_id', $request -> cate_id);
       }
     // sản phẩm bán chạy, hết hàng
       if ($request -> type == 'selling') {
        $product -> where('pro_pay','>', 0 )-> orderby('pro_pay', 'desc');
    }
    if ($request -> type == 'inventory') {
        $product -> where('pro_number','>', 0 );
    }
    if ($request -> type == 'over') {
        $product -> where('pro_number','=', 0 );
    }
    $product = $product ->orderby('pro_number','desc')->paginate(10);
    $category = category::all();
    $viewdata = [
        'product' => $product,
        'category' => $category
    ];
    return view('admin::warehouse.index', $viewdata);
}

}
