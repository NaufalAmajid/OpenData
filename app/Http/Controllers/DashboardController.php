<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countOrganisasi = Organisasi::count();

        return view('pagesAdmin.dashboard.index', compact('countOrganisasi'));
    }
}
