<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Dataset;
use App\Models\Organisasi;
use App\Models\Sektoral;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $countOrganisasi = Organisasi::count();
        $countDataset = Dataset::count();
        $countSektoral = Sektoral::count();
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $rowActivity = Activity::whereDate('created_at', Carbon::today())->get();

        return view('pagesAdmin.dashboard.index', compact('countOrganisasi', 'countSektoral', 'rowActivity', 'today', 'countDataset'));
    }
}
