<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function admin()
    {
        $contacts = Contact::all();

        return view('admin', compact('contacts'));
    }
}
