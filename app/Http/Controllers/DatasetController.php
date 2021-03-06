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
use Illuminate\Support\Facades\Storage;

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
        $activity->nama_kegiatan = Auth::user()->name . ' membuat dataset baru <b>' . $dataset->judul_dataset . '</b>';

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

    public function editFileDataset(Request $request)
    {
        $validationData = $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx'
        ]);

        $fileOld = FileDataset::where('id', '=', $request->idFile)->first();
        $dataset = Dataset::where('kode_dataset', '=', $fileOld->kode_dataset)->first();

        //delete old file
        Storage::delete('public/datasetFile/'.$fileOld->nama_file);

        //name new file and save in storage
        $addName = preg_replace("/[^a-zA-Z0-9]/", " ", $dataset->judul_dataset);
        $addName = strtolower($addName);
        $addName = Str::slug($addName, '-');
        $addName = Rand(100,999).'-New File-'.$addName;
        $getFileExtension = $request->file('file')->getClientOriginalExtension();
        $fileNewName = $addName . '.' . $getFileExtension;
        $validationData['file']->storeAs('public/datasetFile', $fileNewName);

        //update new file
        $fileOld->nama_file = $fileNewName;
        $fileOld->ekstensi_file = $getFileExtension;
        $fileOld->save();

        return response()->json([
            'status' => 'success',
            'message' => 'File berhasil diubah',
            'data' => $fileOld,
        ]);

    }

    public function addLinkFile(Request $req)
    {
        $validationData = $req->validate([
            'link' => 'required'
        ]);

        $fileOld = FileDataset::where('id', '=', $req->idFile)->first();

        //save link in database
        $fileOld->link_file = $validationData['link'];
        $fileOld->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Link berhasil disimpan',
        ]);
    }

    public function deleteDataset(Request $req)
    {
        $dataset = Dataset::where('id', '=', $req->idDataset)->first();
        $fileDataset = FileDataset::where('kode_dataset', '=', $dataset->kode_dataset)->get();

        foreach ($fileDataset as $file) {
            Storage::delete('public/datasetFile/'.$file->nama_file);

            $file->delete();
        }

        $dataset->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Dataset berhasil dihapus',
        ]);

    }

    public function addNewFileDataset(Request $req)
    {
        $validationData = $req->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx'
        ]);

        $dataset = Dataset::where('kode_dataset', '=', $req->kodeDataset)->first();

        //name new file and save in storage
        $addName = preg_replace("/[^a-zA-Z0-9]/", " ", $dataset->judul_dataset);
        $addName = strtolower($addName);
        $addName = Str::slug($addName, '-');
        $addName = Rand(100,999).'-New File-'.$addName;
        $getFileExtension = $validationData['file']->getClientOriginalExtension();
        $fileNewName = $addName . '.' . $getFileExtension;
        $validationData['file']->storeAs('public/datasetFile', $fileNewName);

        //save new file in database
        $fileNew = new FileDataset();
        $fileNew->kode_dataset = $req->kodeDataset;
        $fileNew->nama_file = $fileNewName;
        $fileNew->ekstensi_file = $getFileExtension;
        $fileNew->save();

        return response()->json([
            'status' => 'success',
            'message' => 'File berhasil ditambahkan',
            'data' => $fileNew,
        ]);
    }

    public function editInformationDataset(Request $req)
    {
        $oldInformation = Dataset::where('id', '=', $req->idDataset)->first();
        $oldInformation->judul_dataset = $req->judul;
        $oldInformation->kode_sektoral = $req->sektoral;
        $oldInformation->kode_tag = $req->tag;
        $oldInformation->sumber = $req->sumber;
        $oldInformation->pengelola = $req->pengelola;
        $oldInformation->lisensi = $req->lisensi;
        $oldInformation->versi_dataset = $req->versi;
        $oldInformation->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Informasi berhasil diubah',
        ]);
    }
}
