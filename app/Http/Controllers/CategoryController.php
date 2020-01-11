<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Models\Product;
use App\Models\Category;


class CategoryController extends FrontendController
{
	public function getListProduct (Request $request)
	{
		$url = $request->segment(2);
		$url = preg_split('/(-)/i', $url);
		$product = Product::where('pro_active', Product::STATUS_PUBLIC);
		$cateProduct = [];
		if ($id = array_pop($url)) {
			$cateProduct = Category::find($id)->toArray();
			$product -> where([
				'pro_category_id' => $id,
			]);
		}
			// kiểm tra và lọc giá
		if ($request -> price) {
			$price = $request -> price;
			switch ($price) {
				case '1':
				$product -> where('pro_price', '<', 1000000);
				break;
				case '2':
				$product -> whereBetween('pro_price',[1000000, 3000000])->get();
				break;
				case '3':
				$product -> whereBetween('pro_price',[3000000, 5000000])->get();
				break;
				case '4':
				$product -> whereBetween('pro_price',[5000000, 7000000])->get();
				break;
				case '5':
				$product -> whereBetween('pro_price',[7000000, 10000000])->get();
				break;
				case '6':
				$product -> where('pro_price', '>', 10000000);
				break;
			}
		}
		if ($request -> proname) {
			$price = $request -> proname;
			switch ($price) {
				case 'iphone':
				$product -> where('pro_slug', 'like', '%iphone%');
				break;
				case 'samsung':
				$product -> where('pro_slug', 'like', '%samsung%');
				break;
				case 'oppo':
				$product -> where('pro_slug', 'like', '%oppo%');
				break;
				case 'nokia':
				$product -> where('pro_slug', 'like', '%nokia%');
				break;
				case 'priced':
				$product -> where('pro_price', '<', 1000000);
				break;
				case 'numberhot':
				$product -> where('pro_hot', '=', 1);
				break;
				case 'latest':
				$product -> orderBy('created_at', 'DESC')->get();
				break;
				case 'laptop':
				$product -> where('pro_slug', 'like', '%laptop%');
				break;
			}
		}
		if ($request -> orderby) {
			$orderby = $request -> orderby;
			switch ($orderby) {
				case 'popu':
				$product -> orderBy('pro_pay', 'DESC');
				break;
				case 'rating':
				$product -> orderBy('pro_total_number', 'DESC');
				break;
				case 'date':
				$product -> orderBy('id', 'DESC');
				break;
				break;
				case 'asc':
				$product -> orderBy('pro_price', 'ASC');
				break;
				case 'desc':
				$product -> orderBy('pro_price', 'DESC');
				break;
			}
		}
		if ($request -> keySearch) {
			$product -> where('pro_name', 'like', '%'.$request -> keySearch.'%');
			$cateProduct = [
				'c_name' => $request -> keySearch
			];
		}
		$product = $product->paginate(9);

		$viewData = [
			'product' => $product,
			'cateProduct' => $cateProduct,
			'query' => $request -> query()
		];
		return view('product.index', $viewData);
	}
}
