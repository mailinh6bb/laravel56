<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Rating;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $rating = Rating::paginate(10);
        $viewData = [
            'rating' => $rating
        ];
        return view('admin::rating.index', $viewData);
    }
}
