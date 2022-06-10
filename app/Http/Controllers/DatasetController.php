<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Dataset;
use App\Models\Notifikasi;
use App\Models\Organisasi;
use App\Models\Sektoral;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    public function index()
    {
        $tag = Tags::all();
        $sektoral = Sektoral::all();
        $organisasiName = Organisasi::where('kode_organisasi', '=', Auth::user()->kode_organisasi)->first();

        return view('pagesAdmin.dataset.indexDataset', compact('tag', 'sektoral', 'organisasiName'));
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'judulDataset' => 'required|unique:datasets,judul_dataset|min:10',
            'organisasiDataset' => 'required',
            'sektoralDataset' => 'required',
            'tagDataset' => 'required',
            'dataResources.*' => 'required|mimes:pdf,doc,docx,xls,xlsx',
        ],
        [
            'judulDataset.required' => 'Judul dataset harus diisi',
            'judulDataset.min' => 'Judul dataset minimal 10 karakter',
            'judulDataset.unique' => 'Judul dataset sudah ada',
            'organisasiDataset.required' => 'Organisasi dataset harus diisi',
            'sektoralDataset.required' => 'Sektoral dataset harus diisi',
            'tagDataset.required' => 'Tag dataset harus diisi',
            'dataResources.*.required' => 'Data Resources tidak boleh kosong',
            'dataResources.*.mimes' => 'Data Resources harus berupa file dengan format pdf, doc, docx, xls, xlsx'
        ]);

        $getName = '';
        $file = $request->file('dataResources');

        for ($i = 0; $i < count($file); $i++) {

            $randName = rand(1, 1000) . '_' . Str::random(10);
            $fileNewName = $randName . '.' . $file[$i]->getClientOriginalExtension();
            $fileNameSave = $randName . '.' . $file[$i]->getClientOriginalExtension();
            $getName .= $fileNewName . ';';
            $file[$i]->storeAs('public/datasetFile', $fileNameSave);

        }

        $dataset = new Dataset();
        $dataset->kode_dataset =Str::random(5) . rand(1, 10000);
        $dataset->judul_dataset = $validationData['judulDataset'];
        $dataset->kode_organisasi = Auth::user()->kode_organisasi;
        $dataset->kode_sektoral = $validationData['sektoralDataset'];
        $dataset->kode_tag = $validationData['tagDataset'];
        $dataset->file_dataset = $getName;
        $dataset->pembuat = Auth::user()->name;
        $dataset->sumber = $request->sumberDataset;
        $dataset->pengelola = $request->pengelolaDataset;
        $dataset->lisensi = $request->lisensiDataset;

        $activity = new Activity();
        $activity->kode_kegiatan = $dataset->kode_dataset;
        $activity->nama_kegiatan = $dataset->pembuat . ' membuat dataset baru <b>' . $dataset->judul_dataset . '</b>';

        $notifikasi = new Notifikasi();
        $notifikasi->kode_notifikasi = $dataset->kode_dataset;
        $notifikasi->notifikasi = ' membuat dataset baru <b>' . $dataset->judul_dataset . '</b>';
        $notifikasi->nama_notifikator = Auth::user()->name;


        $dataset->save();
        $activity->save();
        $notifikasi->save();

        return json_encode($response = [
            'status' => 'success',
            'message' => 'Dataset berhasil diupload, tunggu persetujuan administrator untuk publikasi',
            'data' => $dataset,
        ]);
    }

    public function showDataDataset()
    {
        $rowDataset = Dataset::join('organisasis', 'organisasis.kode_organisasi', '=', 'datasets.kode_organisasi')
                ->join('sektorals', 'sektorals.kode_sektor', '=', 'datasets.kode_sektoral')
                ->join('tags', 'tags.kode_tag', '=', 'datasets.kode_tag')
                ->where('datasets.pembuat', '=', Auth::user()->name)
                ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi', 'sektorals.nama_sektor', 'tags.nama_tag')
                ->get();

        return view('pagesAdmin.dataset.informasi.tableDataset', compact('rowDataset'));
    }
}
