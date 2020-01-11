<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Contact;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        $rating = Rating::with('user:id,name', 'product:id,pro_name')->limit(5)->get();
        $contact = Contact::limit(5)->get();
        $transaction = Transaction::orderBy('id', 'DESC')-> take(5) -> get();
// doanh thu ngày
        $moneyDay = Transaction::whereDay('updated_at', date('d'))
        ->where('tr_status', Transaction::STATIC_DONE)
        ->sum('tr_total');

// doanh thu tuần
        $dayAgo = 6;
        $dayToCheck = \Carbon\Carbon::now()->subDays($dayAgo);
        $timeNow = \Carbon\Carbon::now();
        $moneyWeek = Transaction::whereBetween('updated_at',[$dayToCheck,$timeNow])
        ->where('tr_status', Transaction::STATIC_DONE)
        ->sum('tr_total');

// doanh thu tháng
        $moneyMonth = Transaction::whereMonth('updated_at', date('m'))
        ->where('tr_status', Transaction::STATIC_DONE)
        ->sum('tr_total');
// doanh thu năm
        $moneyYear = Transaction::whereYear('updated_at', date('Y'))
        ->where('tr_status', Transaction::STATIC_DONE)
        ->sum('tr_total');
        $dataMoney = [
            [
                'name' =>  "Ngày",
                'y' =>  (int)$moneyDay,
            ],
            [
                'name' =>  "Tuần",
                'y' =>  (int)$moneyWeek,
            ],
            [
              'name' =>  "Tháng",
              'y' =>  (int)$moneyMonth,
          ],
          [
              'name' =>  "Năm",
              'y' =>  (int)$moneyYear,
          ]
      ];

      $viewData = [
        'rating' => $rating,
        'contact' => $contact,
        'transaction' => $transaction,
        'dataMoney' => json_encode($dataMoney)
    ];
    return view('admin::index', $viewData);
}
}
