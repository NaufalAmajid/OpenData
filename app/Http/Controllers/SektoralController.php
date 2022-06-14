<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Notifikasi;
use App\Models\Sektoral;
use Illuminate\Http\Request;

class SektoralController extends Controller
{
    public function index(){

        $rowSektoral = Sektoral::all();

        return view('pagesAdmin.sektoral.indexSektoral', compact('rowSektoral'));
    }

    public function store(Request $request){

        $alfaNumeric = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = substr(str_shuffle($alfaNumeric), 0, 10);

        $validationData = $request->validate([
            'namaSektoral' => 'required|unique:sektorals,nama_sektor',
            'deskripsiSektoral' => 'required',
            'logoSektoral' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'pembuat'=> 'required'
        ]);

        $sektoral = new Sektoral();
        $sektoral->kode_sektor = $randomString;
        $sektoral->nama_sektor = $validationData['namaSektoral'];
        $sektoral->deskripsi = $validationData['deskripsiSektoral'];
        $sektoral->logo_sektor = $randomString.'.'.$validationData['logoSektoral']->getClientOriginalExtension();
        $sektoral->pembuat = $validationData['pembuat'];
        $validationData['logoSektoral']->move(public_path('images/sektoral'), $sektoral->logo_sektor);

        $notifikasi = new Notifikasi();
        $notifikasi->kode_notifikasi = $randomString;
        $notifikasi->notifikasi = 'Sektor <b>'.$sektoral->nama_sektor.'</b> telah ditambahkan';
        $notifikasi->nama_notifikator = $sektoral->pembuat;

        $sektoral->save();
        $notifikasi->save();

        $respond = [
            'status' => 'success',
            'data' => $sektoral
        ];

        return json_encode($respond);
    }

    public function detailSektoral($kodeSektor){

        $sektoral = Sektoral::where('kode_sektor', '=', $kodeSektor)->first();

        $countDataset = Dataset::where('kode_sektoral', '=', $kodeSektor)->count();

        return view('pagesAdmin.sektoral.data.detailSektoral', compact('sektoral', 'countDataset'));
    }
}
