<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Organisasi;
use App\Models\Sektoral;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countOrganisasi = Organisasi::count();
        $countSektoral = Sektoral::count();

        $rowNotifikasi = Notifikasi::all();

        return view('pagesAdmin.dashboard.index', compact('countOrganisasi', 'countSektoral', 'rowNotifikasi'));
    }
}
