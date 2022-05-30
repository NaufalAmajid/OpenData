<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index(){

        $rowOrganisasi = Organisasi::all()->where('is_correct', '=', 2);

        return view('pagesAdmin.organisasi.indexOrganisasi', compact('rowOrganisasi'));
    }
}
