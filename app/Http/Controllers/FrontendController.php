<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
class FrontendController extends Controller
{
	public function __construct(){
		$categories = Category::orderBy('id', 'ASC')->get();
		view()->share('categories', $categories);
	}
}
