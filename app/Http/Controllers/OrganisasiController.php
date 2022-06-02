<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index(){

        $rowOrganisasi = Organisasi::all()->where('is_correct', '=', 2);

        return view('pagesAdmin.organisasi.indexOrganisasi', compact('rowOrganisasi'));
    }

    public function store(Request $request){

        $alfaNumeric = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = substr(str_shuffle($alfaNumeric), 0, 10);

        $validationData = $request->validate([
            'namaOrganisasi' => 'required|unique:organisasis,nama_organisasi',
            'deskripsiOrganisasi' => 'required',
            'logoOrganisasi' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'pembuat'=> 'required'
        ]);

        $organisasi = new Organisasi();
        $organisasi->kode_organisasi = $randomString;
        $organisasi->nama_organisasi = $validationData['namaOrganisasi'];
        $organisasi->deskripsi = $validationData['deskripsiOrganisasi'];
        $organisasi->logo_organisasi = $randomString.'.'.$validationData['logoOrganisasi']->getClientOriginalExtension();
        $organisasi->pembuat = $validationData['pembuat'];
        $validationData['logoOrganisasi']->move(public_path('images/organisasi'), $organisasi->logo_organisasi);

        $notifikasi = new Notifikasi();
        $notifikasi->kode_notifikasi = $randomString;
        $notifikasi->notifikasi = 'Organisasi <b>'.$organisasi->nama_organisasi.'</b> telah ditambahkan';
        $notifikasi->nama_notifikator = $organisasi->pembuat;

        $organisasi->save();
        $notifikasi->save();

        $respond = [
            'status' => 'success',
            'data' => $organisasi
        ];

        return json_encode($respond);
    }
}
