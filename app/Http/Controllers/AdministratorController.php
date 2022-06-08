<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function indexUsers()
    {
        return view('administrator.indexUsers');
    }

    public function admDataset()
    {
        return view('administrator.admDataset');
    }
}
