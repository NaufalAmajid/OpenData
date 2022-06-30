<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Dataset;
use App\Models\FileDataset;
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
        $tag = Tags::where('is_correct', '=', '1')->orderBy('created_at', 'desc')->get();
        $sektoral = Sektoral::where('is_correct', '=', '1')->orderBy('created_at', 'desc')->get();
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

        $kodeDataset = 'DATASET-'.date('YmdHis');
        $file = $request->file('dataResources');
        $addName = preg_replace("/[^a-zA-Z0-9]/", " ", $validationData['judulDataset']);
        $addName = strtolower($addName);
        $addName = Str::slug($addName, '-');

        for ($i = 0; $i < count($file); $i++) {

            $randName = 'File-'.$i.' '.$addName;
            $getFileExtension = $file[$i]->getClientOriginalExtension();
            $fileNewName = $randName . '.' . $getFileExtension;
            $file[$i]->storeAs('public/datasetFile', $fileNewName);

            $saveFile = new FileDataset();
            $saveFile->nama_file = $fileNewName;
            $saveFile->kode_dataset = $kodeDataset;
            $saveFile->ekstensi_file = $getFileExtension;
            $saveFile->save();

        }

        $dataset = new Dataset();
        $dataset->kode_dataset = $kodeDataset;
        $dataset->judul_dataset = $validationData['judulDataset'];
        $dataset->kode_organisasi = Auth::user()->kode_organisasi;
        $dataset->kode_sektoral = $validationData['sektoralDataset'];
        $dataset->kode_tag = $validationData['tagDataset'];
        $dataset->pembuat = Auth::user()->kode_admin;
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
                ->join('users', 'users.kode_admin', '=', 'datasets.pembuat')
                ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi', 'sektorals.nama_sektor', 'tags.nama_tag', 'users.name')
                ->get();

        return view('pagesAdmin.dataset.informasi.tableDataset', compact('rowDataset'));
    }

    public function detailDataset($id)
    {
        $rowDataset = DB::table('datasets')
                ->join('organisasis', 'organisasis.kode_organisasi', '=', 'datasets.kode_organisasi')
                ->join('sektorals', 'sektorals.kode_sektor', '=', 'datasets.kode_sektoral')
                ->join('tags', 'tags.kode_tag', '=', 'datasets.kode_tag')
                ->join('users', 'users.kode_admin', '=', 'datasets.pembuat')
                ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi' , 'organisasis.deskripsi as deskOrg' , 'organisasis.created_at as tglCreateOrg' , 'sektorals.nama_sektor', 'tags.nama_tag', 'users.name')
                ->where('datasets.id', '=', $id)
                ->first();

        $rowFile = FileDataset::where('kode_dataset', '=', $rowDataset->kode_dataset)->get();

        $rowSektoral = Sektoral::where('is_correct', '=', 1)->get();

        $rowTag = Tags::where('is_correct', '=', 1)->get();

        return view('pagesAdmin.dataset.informasi.detailDataset', compact('rowDataset', 'rowFile', 'rowSektoral', 'rowTag'));
    }

}
