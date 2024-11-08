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

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'phone_area_code', 'phone_prefix', 'phone_line_number', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', compact('contact', 'categories'));
    }

    public function thanks()
    {
        $contact = (['tell' => $request->phone_area_code . $request->phone_prefix . $request->phone_line_number] + $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']));
        return view('thanks');
    }
}
