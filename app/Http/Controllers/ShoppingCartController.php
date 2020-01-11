<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Order;

class ShoppingCartController extends Controller
{
	
	public function addProduct(Request $request, $id){
		$product = Product::select('id', 'pro_name', 'pro_avatar', 'pro_price', 'pro_sale', 'pro_number')->find($id);
		if(!$product) return redirect('/');

		if ($product -> pro_sale > 0) {
			$price = $product -> pro_price*(100-$product-> pro_sale)/100;
		}
		else {
			$price = $product -> pro_price;
		}
		if ($product -> pro_number == 0) {
			return redirect() -> back()-> with(['flash_level' => 'danger', 'flash_message' => 'Xin Lỗi Bạn! Sản Phẩm Này Của Chúng Tôi Tạm Hết Hàng']);
		}

			\Cart::add([
				'id'=> $id, 
				'name' => $product-> pro_name,
				'qty' => 1,
				'price' => $price,
				'options' => ['avatar' => $product -> pro_avatar, 'sale' => $product ->pro_sale, 'price_old' => $product ->pro_price]
			]	);
			$content = Cart::content();
			return redirect()->back()-> with(['flash_level' => 'success', 'flash_message' => 'Mua Hàng Thành Công! Click Vô Đây Để Đến ->  <a href="/shopping/list" title="">Giỏ Hàng</a> ']);;
	}

	public function listProduct(){
		$content = Cart::content();
		$total = Cart::subTotal(0, ',', '.');
		$viewData = [
			'content' => $content,
			'total' => $total
		];
		return view('shopping.list', $viewData);
	}

	public function deleteProduct($id){
		Cart::remove($id);
		return redirect()->route('list.shopping.cart');
	}

	public function getFormPay(){
		$content = Cart::content();
		return view('shopping.pay', compact('content'));
	}
	/*
	Lưu Thông Tin Thanh Toán
	 */
	public function saveInfoShoppingCart(Request $request){
		$totalMoney = str_replace(',', '', \Cart::subTotal(0,3));
		$transactionId = Transaction::insertGetId([
			'tr_user_id' => get_data_user('web'),
			'tr_total' =>(int) $totalMoney,
			'tr_note' => $request -> note,
			'tr_phone' => $request -> phone, 
			'tr_address' => $request -> address,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);
		if ($transactionId) {
			$content = \Cart::content();
			foreach ($content as $item) {
				Order::insert([
					'or_transaction_id' => $transactionId,
					'or_product_id' => $item -> id,
					'or_qty' => $item -> qty,
					'or_price' => $item -> price,
					'or_sale' => $item-> options -> sale,
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now()
				]);
			}
		}
		\Cart::destroy();
		return redirect('/')->with(['flash_level' => 'success', 'flash_message' => "Thanh Toán Thành Công"]);;
	}

}
