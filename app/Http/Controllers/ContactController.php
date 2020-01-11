<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
class ContactController extends FrontendController
{
	public function getContact(){
		return view('contact');
	}
	public function postContact(Request $request){
		$data = $request-> except('_token');
		$data['created_at'] = $data['updated_at'] = Carbon::now();
		// loại bỏ 1 value
		Contact::insert($data);
		return redirect()->back();
	}
}
