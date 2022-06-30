<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Notifikasi;
use App\Models\Sektoral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SektoralController extends Controller
{
    public function index(){

        return view('pagesAdmin.sektoral.indexSektoral');
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

        $getAdmin = User::where('kode_admin', '=', $sektoral->pembuat)->first();

        return view('pagesAdmin.sektoral.data.detailSektoral', compact('sektoral', 'countDataset', 'getAdmin'));
    }

    public function update(Request $request){
        $validation = $request->validate([
            'namaSektoral' => 'required',
            'deskripsi' => 'required',
            'nameLogoSektoralOld' => 'required'
        ]);

        if($request->hasFile('editlogoSektoral')){

            $editLogo = $request->validate([
                'editlogoSektoral' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            $editLogo = $editLogo['editlogoSektoral']->getClientOriginalExtension();
            $editLogo = Str::random(10).'.'.$editLogo;

            //delete old logo
            $path = public_path('images/sektoral/'.$validation['nameLogoSektoralOld']);
            unlink($path);

            //upload new logo
            $request->file('editlogoSektoral')->move(public_path('images/sektoral'), $editLogo);

        }else{

            $editLogo = $validation['nameLogoSektoralOld'];
        }

        $sektoral = Sektoral::where('id', $request->idSektoral)->first();
        $sektoral->nama_sektor = $validation['namaSektoral'];
        $sektoral->deskripsi = $validation['deskripsi'];
        $sektoral->logo_sektor = $editLogo;
        $sektoral->update();



        return response()->json('success');
    }

    public function showDataSektoral(){

        $rowSektoral = Sektoral::all();

        return view('pagesAdmin.sektoral.data.tableSektoral', compact('rowSektoral'));
    }
}
