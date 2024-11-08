<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $categories = Category::all();

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell' ,'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
