<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SektoralController extends Controller
{
    public function index(){
        return view('pagesAdmin.sektoral.indexSektoral');
    }
}
