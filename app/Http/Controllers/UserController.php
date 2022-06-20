<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('layout.userLayout.layoutUser');
    }

    public function home()
    {
        return view('mainPage');
    }

    public function dataset()
    {
        return view('pagesUser.dataset');
    }

    public function organisasi()
    {
        return view('pagesUser.organisasi');
    }

    public function sektoral()
    {
        return view('pagesUser.sektoral');
    }

    public function tentang()
    {
        return view('pagesUser.tentang');
    }

}
