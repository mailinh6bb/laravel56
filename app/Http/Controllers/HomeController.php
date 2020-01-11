<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\ReplyComment;
use Carbon\Carbon;

class HomeController extends FrontEndController
{
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$productPhone = Product::where([
			'pro_active' => Product::STATUS_PUBLIC,
			'pro_category_id' => 1
		])->limit(8)->get(); // điện thoại nổi bật

		$productLaptop = Product::where([
			'pro_active' => Product::STATUS_PUBLIC,
			'pro_category_id' => 3
		])->limit(8)->get(); // laptop nổi bật

		$categoriHome = Category::with('products')->where('c_home', Category::HOME)
		->limit(3)->get(); // danh mục hiện thị cho home
		$articleNews = Article::orderBy('id', 'DESC')->limit(3)->get(); // tin tức mới nhất
// gợi ý sản phẩm đã mua cùng danh mục với nó khi mình thanh toán sản phẩm đó
		$productSuggets = [];
		if (get_data_user('web')) {
			$transactions = Transaction::where([
				'tr_user_id' => get_data_user('web'),
				'tr_status' => Transaction::STATIC_DONE
			])->pluck('id');
			if ($transactions) {
				$listIdPro = Order::whereIn('or_transaction_id', $transactions)->distinct()->pluck('or_product_id');
				$listIdCate = Product::whereIn('id', $listIdPro)->distinct()->pluck('pro_category_id');
				if ($listIdCate) {
					$productSuggets = Product::whereRaw(1);
					$productSuggets = Product::whereIn('pro_category_id', $listIdCate)->WhereNotIN('id',$listIdPro)->limit(8)->get();
					// có thể nhiều danh mục nên whereIn
				}
			}
		}
//


// mảng dữ liệu
		$viewData = [
			'productPhone' => $productPhone,
			'productLaptop' => $productLaptop,
			'articleNews' => $articleNews,
			'categoriHome' => $categoriHome,
			'productSuggets' => $productSuggets
		];
		return view('home.index', $viewData);
	}
	// hiển thị những sản phẩm người dùng đã xem
	public function viewProduct (Request $request){
		if ($request -> ajax()) {
			$listID = $request -> id;
			$productView = Product::whereIn('id', $listID)->get();
			$html = view('components.view_product', compact('productView'))->render();
			return response()-> json(['data' => $html] );
		}
		
	}
	// tìm kiếm sản phảma
	public function formSearch(Request $request){
		if ($request -> key) {
			$key = $request -> key;
			$products = Product::where('pro_name', 'like','%'.$request -> key.'%')->limit(5)->get();
			$html = view('components.form_search', compact('products'))->render();
			return response()-> json(['data' => $html] );
		}
	}
// phần reply comment
	public function replyComment(Request $request, $id){

		if ($request -> ajax()) {
			$replyComment = new ReplyComment();
			$replyComment -> rep_user_id = get_data_user('web') ? get_data_user('web') : 'NA';
			$replyComment -> rep_article_id = $id;
			$replyComment -> rep_comment_id = $request -> idArtCmt;
			$replyComment -> rep_name = $request -> rep_name;
			$replyComment -> rep_content = $request -> rep_content;
			$replyComment -> created_at = Carbon::now();
			$replyComment -> updated_at = Carbon::now();
			$replyComment -> save();
			return  response()->json(['code' => '1']);	
		};
	}
}
