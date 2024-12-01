<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        return view('home', compact('user'));
    }
}

