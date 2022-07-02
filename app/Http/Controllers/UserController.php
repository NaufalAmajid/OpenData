<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\FileDataset;
use App\Models\Organisasi;
use App\Models\Sektoral;
use App\Models\Tags;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $countDataset = Dataset::where('is_publish', 1)->count();
        $countOrganisasi = Organisasi::where('is_correct', 2)->count();
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
        // get parameter url tag or organisasi or sektoral
        $tag = $request->tag ?? '';
        $title = $request->search ?? '';
        $dataset = Dataset::where('is_publish', 1)->where('judul_dataset', 'like', '%' . $title . '%')->where('kode_tag', 'like', '%' . $tag . '%')->get();
        $file = FileDataset::all();
        $getNameTag = Tags::where('kode_tag', $tag)->first();

        return response()->json([
            'dataset' => $dataset,
            'namaTag' => $getNameTag,
            'view' => view('pagesUser.data.dataDataset', compact('dataset', 'file'))->render()
        ]);
    }

    public function detailDataset($kodeDataset)
    {
        $dataset = Dataset::join('organisasis', 'datasets.kode_organisasi', '=', 'organisasis.kode_organisasi')
            ->where('datasets.kode_dataset', $kodeDataset)
            ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi', 'organisasis.kode_organisasi', 'organisasis.deskripsi as deskOrg')
            ->first();

        return view('pagesUser.extra.detailDataset', compact('dataset'));
    }

    public function extraDataset(Request $req)
    {
        if($req->dataset){

            $location = 'pagesUser.extra.dataset.informasi';
            $kode = $req->dataset;

        }else if($req->sektoral){

            $location = 'pagesUser.extra.dataset.infoSektoral';
            $kode = $req->sektoral;
        }

        $dataset = Dataset::join('organisasis', 'datasets.kode_organisasi', '=', 'organisasis.kode_organisasi')
                    ->join('sektorals', 'datasets.kode_sektoral', '=', 'sektorals.kode_sektor')
                    ->join('tags', 'datasets.kode_tag', '=', 'tags.kode_tag')
                    ->join('users', 'datasets.pembuat', '=', 'users.kode_admin')
                    ->where('datasets.kode_dataset', $kode)
                    ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi', 'organisasis.kode_organisasi', 'organisasis.deskripsi as deskOrg', 'sektorals.nama_sektor', 'sektorals.logo_sektor', 'sektorals.id as sektorId', 'tags.nama_tag', 'users.name as namaAdmin')
                    ->first();
        $fileDataset = FileDataset::where('kode_dataset', $kode)->get();

        return view($location, compact('dataset', 'fileDataset'));
    }

    public function detailFileDataset($id)
    {
        $fileDataset = FileDataset::find($id);
        $dataset = Dataset::join('organisasis', 'datasets.kode_organisasi', '=', 'organisasis.kode_organisasi')
                    ->where('datasets.kode_dataset', $fileDataset->kode_dataset)
                    ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi', 'organisasis.deskripsi as deskOrg')
                    ->first();

        return view('pagesUser.extra.detailFileDataset', compact('dataset', 'fileDataset'));

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

    public function detailOrganisasi($kodeOrganisasi)
    {
        $organisasi = Organisasi::where('kode_organisasi', $kodeOrganisasi)->first();
        $dataset = Dataset::where('is_publish', 1)->where('kode_organisasi', $kodeOrganisasi)->get();
        $file = FileDataset::all();
        $tag = Tags::where('is_correct', 1)->get();
        $sektoral = Sektoral::all();

        return view('pagesUser.extra.detailOrganisasi', compact('organisasi', 'dataset', 'file', 'tag', 'sektoral'));
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
        $sektoral = Sektoral::find($id);
        $dataset = Dataset::where('is_publish', 1)->where('kode_sektoral', $sektoral->kode_sektor)->get();
        $file = FileDataset::all();
        $organisasi = Organisasi::all();
        $tag = Tags::where('is_correct', 1)->get();

        return view('pagesUser.extra.detailSektoral', compact('sektoral', 'dataset', 'file', 'organisasi', 'sektoral', 'tag'));
    }

    public function tentang()
    {
        return view('pagesUser.tentang');
    }

}
