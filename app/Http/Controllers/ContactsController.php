<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;
use App\Contact;
class ContactsController extends Controller
{
	private $limit = 5;
    public function index(Request $r)
    {
    	if ($group_id = ($r->get('group_id'))) {
    		$contacts = Contact::where('group_id', $group_id)->paginate($this->limit);
    	}
    	else {
    	$contacts = Contact::paginate($this->limit);
    	}

    	return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view("contacts.create");
    }
}
