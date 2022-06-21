<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Organisasi;
use App\Models\Sektoral;
use App\Models\Tags;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('layout.userLayout.layoutUser');
    }

    public function home()
    {
        $countDataset = Dataset::where('is_publish', 1)->count();
        $countOrganisasi = Organisasi::where('is_correct', 1)->count();
        $countSektoral = Sektoral::where('is_correct', 1)->count();

        return view('mainPage', compact('countDataset', 'countOrganisasi', 'countSektoral'));
    }

    public function dataset()
    {
        $dataset = Dataset::where('is_publish', 1)->get();
        $organisasi = Organisasi::all();
        $sektoral = Sektoral::where('is_correct', 1)->get();
        $tag = Tags::where('is_correct', 1)->get();

        return view('pagesUser.dataset', compact('dataset', 'organisasi', 'sektoral', 'tag'));
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
