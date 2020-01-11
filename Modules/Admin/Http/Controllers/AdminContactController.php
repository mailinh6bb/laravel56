<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
   public function index()
   {
    $contact = Contact::paginate(10);
    $viewData = [
        'contact' => $contact
    ];
    return view('admin::contact.index', $viewData);
}
}
