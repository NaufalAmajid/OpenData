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

    public function showDataSektoral()
    {

        $dataSektoral = DB::table('sektorals')->join('users', 'sektorals.pembuat', '=', 'users.kode_admin')->select('sektorals.*', 'users.name')->get();


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

        //delete logo sektoral
        if($getIdSektoral->logo_sektor != ''){
            $path = public_path('/images/sektoral/'.$getIdSektoral->logo_sektor);
            unlink($path);
        }

        $getIdSektoral->delete();

        $response = [
            'status' => 'success',
            'message' => 'Sektoral berhasil dihapus',
        ];

        return json_encode($response);
    }

    public function detailAdmin($id)
    {
        $dataAdmin = User::findOrFail($id);

        $organisasi = Organisasi::all();

        $organisasiAdmin = Organisasi::where('kode_organisasi', $dataAdmin->kode_organisasi)->first();

        $countDatasetUserCreate = Dataset::where('pembuat', $dataAdmin->kode_admin)->count();

        $countSektoralUserCreate = Sektoral::where('pembuat', $dataAdmin->kode_admin)->count();

        $countTagUserCreate = Tags::where('pembuat', $dataAdmin->kode_admin)->count();

        return view('administrator.extra.detailAdmin', compact('dataAdmin', 'organisasi', 'organisasiAdmin', 'countDatasetUserCreate', 'countSektoralUserCreate', 'countTagUserCreate'));
    }

    public function editAdmin(Request $request)
    {
        $validate = $request->validate([
            'editNamaLengkap' => 'required',
            'editOrganisasiAdmin' => 'required',
            'editUsername' => 'required',
        ]);
        if($request->editIsAdmin == 1){
            $isAdmin = true;
        }else{
            $isAdmin = false;
        }

        $getIdAdmin = User::findOrFail($request->idAdmin);
        $getIdAdmin->name = $validate['editNamaLengkap'];
        $getIdAdmin->kode_organisasi = $validate['editOrganisasiAdmin'];
        $getIdAdmin->username = $validate['editUsername'];
        $getIdAdmin->is_admin = $isAdmin;
        $getIdAdmin->save();

        return response()->json('success');
    }

    public function detailOrganisasi($id)
    {
        $dataOrganisasi = Organisasi::findOrFail($id);
        $countDataset  = Dataset::where('kode_organisasi', $dataOrganisasi->kode_organisasi)->count();
        $countUser = User::where('kode_organisasi', $dataOrganisasi->kode_organisasi)->count();
        return view('administrator.extra.detailOrganisasi', compact('dataOrganisasi', 'countDataset', 'countUser'));
    }

    public function checkOrganisasiBeforeDelete(Request $request)
    {
        $getKodeOrganisasiUser = User::where('kode_organisasi', $request->kodeOrg)->get();
        $getKodeOrganisasiDataset = Dataset::where('kode_organisasi', $request->kodeOrg)->get();

        if(count($getKodeOrganisasiDataset) > 0 ){

            $response = [
                'status' => 'error',
                'message' => 'Masih ada Dataset yang menggunakan organisasi ini',
                'color' => '#f02222',
            ];

        }else if(count($getKodeOrganisasiUser) > 0){

            $response = [
                'status' => 'error',
                'message' => 'Organisasi tidak dapat dihapus karena masih memiliki user',
                'color' => '#fa1100',
            ];

        }else{

                $response = [
                    'status' => 'success',
                    'message' => 'Organisasi berhasil dihapus',
                    'color' => '#12c40c',
                ];
        }

        return json_encode($response);

    }

    public function deleteOrganisasi(Request $request)
    {
        $getKodeOrganisasi = Organisasi::where('kode_organisasi', $request->kodeOrg)->first();

        // delete logo organisasi
        if($getKodeOrganisasi->logo_organisasi != ''){
            $path = public_path('/images/organisasi/'.$getKodeOrganisasi->logo_organisasi);
            unlink($path);
        }

        $getKodeOrganisasi->delete();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Organisasi berhasil dihapus',
            ]
        );
    }
}
