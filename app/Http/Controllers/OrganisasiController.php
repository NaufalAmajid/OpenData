<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Organisasi;
use App\Models\User;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index(){

        $rowAdmin = User::join('organisasis', 'users.kode_organisasi', '=', 'organisasis.kode_organisasi')
                    ->select('users.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi')
                    ->orderBy('users.is_active', 'desc')
                    ->get();

        return view('pagesAdmin.organisasi.indexOrganisasi', compact('rowAdmin'));
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
