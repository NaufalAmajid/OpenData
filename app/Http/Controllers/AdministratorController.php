<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Organisasi;
use App\Models\Sektoral;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function indexUsers()
    {
        $rowOrganisasi = Organisasi::all();

        return view('administrator.indexUsers', compact('rowOrganisasi'));
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

    public function showDataTags()
    {
        $dataTag = Tags::all();

        return view('administrator.data.tableDataTags', compact('dataTag'));
    }

    public function showDataSektoral(){
        $dataSektoral = Sektoral::all();

        return view('administrator.data.tableDataSektoral', compact('dataSektoral'));
    }

    public function showDataset()
    {
        $dataDataset = DB::table('datasets')
            ->join('organisasis', 'datasets.kode_organisasi', '=', 'organisasis.kode_organisasi')
            ->join('sektorals', 'datasets.kode_sektoral', '=', 'sektorals.kode_sektor')
            ->join('tags', 'datasets.kode_tag', '=', 'tags.kode_tag')
            ->select('datasets.*', 'organisasis.nama_organisasi', 'organisasis.logo_organisasi',
                'sektorals.nama_sektor', 'tags.nama_tag')
            ->get();

        return view('administrator.data.tableDataset', compact('dataDataset'));
    }

    public function storeNewAdmin(Request $request)
    {
        $validate = $request->validate([
            'namaLengkap' => 'required|unique:users,name',
            'organisasiAdmin' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
            [
                'namaLengkap.required' => 'Nama Lengkap tidak boleh kosong',
                'namaLengkap.unique' => 'Nama Lengkap sudah ada',
                'organisasiAdmin.required' => 'Organisasi tidak boleh kosong',
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah ada',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 5 karakter',
                'password.regex' => 'Password harus mengandung huruf kapital, huruf kecil dan angka',
            ]);


        if($request->isAdmin == null){
            $isAdmin = false;
        }else{
            $isAdmin = true;
        }

        $dataAdmin = new User();
        $dataAdmin->kode_admin = 'ADM'.date('YmdHis');
        $dataAdmin->name = $validate['namaLengkap'];
        $dataAdmin->kode_organisasi = $validate['organisasiAdmin'];
        $dataAdmin->username = $validate['username'];
        $dataAdmin->password = bcrypt($validate['password']);
        $dataAdmin->is_admin = $isAdmin;
        $dataAdmin->save();

        $response = [
            'status' => 'success',
            'data' => $dataAdmin,
        ];

        return json_encode($response);
    }

    public function publishDataset(Request $request)
    {
        $getIdDataset = Dataset::findOrFail($request->id);
        $getIdDataset->is_publish = 1;
        $getIdDataset->save();

        $response = [
            'status' => 'success',
            'data' => $getIdDataset,
        ];

        return json_encode($response);
    }

    public function acceptTag(Request $request)
    {
        $getIdTag = Tags::findOrFail($request->idTag);
        $getIdTag->is_correct = 1;
        $getIdTag->save();

        $response = [
            'status' => 'success',
            'data' => $getIdTag,
        ];

        return json_encode($response);
    }

    public function editTagName(Request $request)
    {
        $getIdTag = Tags::findOrFail($request->id);
        $getIdTag->nama_tag = $request->namaTag;
        $getIdTag->save();

        $response = [
            'status' => 'success',
            'data' => $getIdTag,
        ];

        return json_encode($response);
    }

    public function checkBeforeDeleteTag(Request $request)
    {
        $chekcTag = Dataset::where('kode_tag', $request->kodeTag)->get();

        if(count($chekcTag) > 0){

            $response = [
                'status' => 'error',
                'message' => 'Tag ini masih digunakan',
                'color' => '#f02222',
            ];

        }else{

            $response = [
                'status' => 'success',
                'message' => 'Tag berhasil dihapus',
                'color' => '#12c40c',
            ];
        }

        return json_encode($response);
    }

    public function deleteTag(Request $request)
    {
        $getIdTag = Tags::findOrFail($request->idTag);
        $getIdTag->delete();

        $response = [
            'status' => 'success',
            'message' => 'Tag berhasil dihapus',
        ];

        return json_encode($response);
    }

    public function acceptSektoral(Request $request)
    {
        $getIdSektoral = Sektoral::findOrFail($request->idSektoral);
        $getIdSektoral->is_correct = 1;
        $getIdSektoral->save();

        $response = [
            'status' => 'success',
            'data' => $getIdSektoral,
        ];

        return json_encode($response);
    }

    public function checkSektoralBeforeDelete(Request $request)
    {
        $getKodeSektor = Dataset::where('kode_sektoral', $request->kodeSektor)->get();

        if(count($getKodeSektor) > 0){

            $response = [
                'status' => 'error',
            ];

        }else{

            $response = [
                'status' => 'success',
            ];
        }

        return json_encode($response);

    }

    public function deleteSektoral(Request $request)
    {
        $getIdSektoral = Sektoral::findOrFail($request->idSektoral);
        $getIdSektoral->delete();

        $response = [
            'status' => 'success',
            'message' => 'Sektoral berhasil dihapus',
        ];

        return json_encode($response);
    }

    public function detailAdmin($id, $admin)
    {
        $dataAdmin = User::findOrFail($id);

        $organisasi = Organisasi::all();

        $organisasiAdmin = Organisasi::where('kode_organisasi', $dataAdmin->kode_organisasi)->first();

        return view('administrator.extra.detailAdmin', compact('dataAdmin', 'organisasi', 'organisasiAdmin'));
    }
}
