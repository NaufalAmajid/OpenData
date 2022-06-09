<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function indexUsers()
    {
        return view('administrator.indexUsers');
    }

    public function admDataset()
    {
        return view('administrator.admDataset');
    }

    public function showDataAdmin()
    {

        $dataAdmin = DB::table('users')
            ->join('organisasis', 'users.kode_organisasi', '=', 'organisasis.kode_organisasi')
            ->select('users.*', 'organisasis.nama_organisasi')
            ->get();

        return view('administrator.data.tableDataAdmin', compact('dataAdmin'));

    }

    public function showDataOrganisasi()
    {
        $dataOrganisasi = Organisasi::all();

        return view('administrator.data.tableDataOrganisasi', compact('dataOrganisasi'));
    }
}
