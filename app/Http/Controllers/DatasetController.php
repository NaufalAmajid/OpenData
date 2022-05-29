<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index()
    {
        return view('pagesAdmin.dataset.indexDataset');
    }

    public function indexTags()
    {
        return view('pagesAdmin.dataset.indexTags');
    }
}
