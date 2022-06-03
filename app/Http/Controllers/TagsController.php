<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{

    public function index()
    {
        return view('pagesAdmin.dataset.indexTags');
    }

    public function read()
    {
        $tags = Tags::orderBy('created_at', 'desc')->first()->all();

        return view('pagesAdmin.dataset.tags.tableTags', compact('tags'));
    }

    public function store(Request $request)
    {
        $validationData =  $request->validate([
            'namaTags' => 'required|unique:tags,nama_tag',
        ]);

        $tag = new Tags();
        $tag->kode_tag = rand(1, 100) . Str::random(5);
        $tag->nama_tag = $validationData['namaTags'];
        $tag->pembuat = $request->pembuat;
        $tag->save();

        return json_encode(['data' => $tag, 'status' => 'success','message' => 'Berhasil menambahkan tag, silahkan tunggu persetujuan admin untuk menambahkan ke dataset']);
    }
}
