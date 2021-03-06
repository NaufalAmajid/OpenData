<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Notifikasi;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{

    public function index()
    {
        return view('pagesAdmin.dataset.indexTags');
    }

    public function read()
    {
        $tags = Tags::join('users', 'users.kode_admin', '=', 'tags.pembuat')
            ->select('tags.*', 'users.name')
            ->orderBy('tags.created_at', 'desc')
            ->get();

        return view('pagesAdmin.dataset.tags.tableTags', compact('tags'));
    }

    public function store(Request $request)
    {
        $validationData =  $request->validate([
            'namaTags' => 'required|unique:tags,nama_tag',
        ]);

        $tag = new Tags();
        $tag->kode_tag = 'tag'.date('YmdHis');
        $tag->nama_tag = $validationData['namaTags'];
        $tag->pembuat = $request->pembuat;

        $activity = new Activity();
        $activity->kode_kegiatan = $tag->kode_tag;
        $activity->nama_kegiatan = Auth::user()->name . ' menambahkan tag <b>' . $tag->nama_tag . '</b>';

        $notifikasi = new Notifikasi();
        $notifikasi->kode_notifikasi = $tag->kode_tag;
        $notifikasi->notifikasi = 'Menambahkan tag <b>' . $tag->nama_tag . '</b>';
        $notifikasi->nama_notifikator = $tag->pembuat;

        $notifikasi->save();
        $activity->save();
        $tag->save();

        return json_encode(['data' => $tag, 'status' => 'success','message' => 'Berhasil menambahkan tag, silahkan tunggu persetujuan admin untuk menambahkan ke dataset']);
    }
}
