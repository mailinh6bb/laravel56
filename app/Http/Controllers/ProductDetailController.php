<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
class ProductDetailController extends FrontendController
{
	public function __construct(){
		parent::__construct();
	}
	public function productDetail (Request $request){
		$url = $request->segment(2);
		$url = preg_split('/(-)/i', $url);
		if ($id = array_pop($url)) {
			$productDetail = Product::find($id);
			$pro_view =  Product::find($id)->increment('pro_view'); // tang tong luot xem và trong db ko đc null
			$productSame = Product::where('pro_category_id', $productDetail->pro_category_id)->get();
			$cateProduct = Category::find($productDetail->pro_category_id);
			$rating = Rating::with('user:id,name')->where('ra_product_id', $id)->paginate(10);
//gom nhóm và tính tổng đánh giá
			$ratingsDashboard = Rating::groupBy('ra_number')
			->where('ra_product_id', $id)
			->select(DB::raw('count(ra_number) as total'), DB::raw('sum(ra_number) as sum'))
			->addSelect('ra_number')
			->get()->toArray();

			$arrayRating = [];
			if (!empty($ratingsDashboard)) {
				// lặp để lấy giá trị các đánh giá còn lại
				for ($i=1; $i <= 5 ; $i++) { 
					$arrayRating[$i] = [
						"total" => 0,
						"sum" => 0,
						"ra_number" => 0
					];
					foreach ($ratingsDashboard as $item) {
						// kiểm tra xem arrayRating và số đánh giá trùng
						if ($item['ra_number'] == $i) {
							$arrayRating[$i] = $item;
							continue;
						}
					}
				}
			}
			// dd($arrayRating);
			$viewData = [
				'productDetail' => $productDetail,
				'productSame' => $productSame,
				'cateProduct' => $cateProduct,
				'rating' => $rating,
				'arrayRating' => $arrayRating
			];
			return view('product.detail', $viewData);
		}
	}
	
}
