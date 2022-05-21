<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pagesAuthentication.login.indexLogin');
    }

    public function process(Request $request)
    {
        dd($request->all());
    }
}
