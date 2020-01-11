<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class AdminTransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::orderby('tr_status', 'ASC')-> orderby('created_at', 'DESC')->paginate(10);
        return view('admin::transaction.index', compact('transaction'));
    }
    public function viewOrder(Request $request, $id){
    	if ($request -> ajax()) {
    		$orders = Order::where('or_transaction_id', $id)->get();
    		$html = view('admin::component.order', compact('orders'))->render();
    		return \response()->json($html);
    	}
    }


// xử lý đơn hàng và lưu 1 số thông tin khác


    public function actionTransaction($active,$id){
        $transaction = Transaction::find($id);  
        $message = '';
        if ($active) {
            switch ($active) {
                case 'status':
                $orders= Order::where('or_transaction_id',$id)->get();
                if ($orders) {
                    foreach ($orders as $order) {
                        $product = Product::find($order -> or_product_id);
                        $product -> pro_number = $product -> pro_number - $order -> or_qty;
                        $product -> pro_pay++;
                        $product -> save();
                    }
                }
    \DB::table('users')->where('id', $transaction -> tr_user_id)->increment('total_pay'); // tang tong luot mua cua user 
    $transaction -> tr_status = Transaction::STATIC_DONE;
    $transaction -> tr_cancel = Transaction::STATIC_DEFAULT;
    $transaction -> save();
    $message = 'Xử Lý Thành Công';
    break;
    case 'cancel':
    $transaction -> tr_cancel = Transaction::STATIC_CANCEL;
    $transaction -> tr_status = Transaction::STATIC_DONE;
    $transaction -> save();
    $message = 'Xử Lý Thành Công';
    break;
    case 'delete':
    $transaction -> delete($id);
    $message = 'Xóa Dữ Liệu Thành Công';
    break;
}
}
return redirect()->back()-> with(['flash_level' => 'success', 'flash_message' => $message]);
}
}
