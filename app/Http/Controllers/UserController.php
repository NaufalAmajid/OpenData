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
        $countDataset = Dataset::where('is_publish', 1)->count();
        $countOrganisasi = Organisasi::where('is_correct', 1)->count();
        $countSektoral = Sektoral::where('is_correct', 1)->count();

        return view('mainPage', compact('countDataset', 'countOrganisasi', 'countSektoral'));
    }

    public function dataset()
    {

        $organisasi = Organisasi::all();
        $sektoral = Sektoral::where('is_correct', 1)->get();
        $tag = Tags::where('is_correct', 1)->get();
        $dataset = Dataset::where('is_publish', 1)->get();

        return view('pagesUser.dataset', compact('dataset', 'organisasi', 'sektoral', 'tag'));
    }

    public function datasetList(Request $request)
    {
        $title = $request->search ?? '';
        $dataset = Dataset::where('is_publish', 1)->where('judul_dataset', 'like', '%' . $title . '%')->get();

        return response()->json([
            'dataset' => $dataset,
            'view' => view('pagesUser.data.dataDataset', compact('dataset'))->render()
        ]);
    }

    public function organisasi()
    {
        return view('pagesUser.organisasi');
    }

    public function organisasiList(Request $request)
    {
        $name = $request->search ?? '';
        $organisasi = Organisasi::where('nama_organisasi', 'like', '%' . $name . '%')->get();
        $dataset = Dataset::where('is_publish', 1)->get();

        return response()->json([
            'organisasi' => $organisasi,
            'view' => view('pagesUser.data.dataOrganisasi', compact('organisasi', 'dataset'))->render()
        ]);
    }

    public function sektoral()
    {
        return view('pagesUser.sektoral');
    }

    public function sektoralList(Request $request)
    {
        $name = $request->search ?? '';
        $sektoral = Sektoral::where('is_correct', 1)->where('nama_sektor', 'like', '%' . $name . '%')->get();
        $dataset = Dataset::where('is_publish', 1)->get();

        return response()->json([
            'sektoral' => $sektoral,
            'view' => view('pagesUser.data.dataSektoral', compact('sektoral', 'dataset'))->render()
        ]);
    }

    public function detailSektoral($id)
    {
        return view('pagesUser.tag');
    }

    public function tentang()
    {
        return view('pagesUser.tentang');
    }

}
