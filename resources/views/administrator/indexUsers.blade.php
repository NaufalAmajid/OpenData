@extends('layout.adminLayout.layoutAdmin')

@section('content')
<div class="row">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent mb-0">
            <li class="breadcrumb-item">
                <a href="/dashboard">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('users') }}">Daftar Admin dan Organisasi</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Admin dan Organisasi</h1>
            <p class="mb-0">Berikut daftar admin aktif dan organisasi.</p>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="dropdown">
        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-bookmark-plus-fill"></i>
            <span class="px-2">Buat</span>
        </button>
        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
            <a class="dropdown-item d-flex align-items-center" href="javascript:showModalAddAdmin()">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                    </path>
                </svg>
                Admin Baru
            </a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:showModalAddOrganisasi()">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                    </path>
                </svg>
                Organisasi Baru
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Tabel Daftar Admin </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush alignt-item-center" id="tableDataAdmin">
                            <thead>
                                <tr>
                                    <th class="border-bottom" scope="col">Nama</th>
                                    <th class="border-bottom" scope="col">Status</th>
                                    <th class="border-bottom" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="showDataAdmin">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Tabel Daftar Organisasi </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush alignt-item-center" id="tableOrganisasiAdministrator">
                            <thead>
                                <tr>
                                    <th class="border-bottom" scope="col">Organisasi</th>
                                    <th class="border-bottom" scope="col">Status</th>
                                    <th class="border-bottom" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="showDataOrganisasi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAddAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAddOrganisasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function showModalAddAdmin() {
        $('#modalAddAdmin').modal('show');
    }

    function showModalAddOrganisasi() {
        $('#modalAddOrganisasi').modal('show');
    }

    function selectDataAdmin(){

        $.get('{{ route('tableDataAdmin') }}', function(data){

            $('#showDataAdmin').html(data);
            $('#tableDataAdmin').DataTable({
                "language": {
                    "url": "/otherAsset/language/dataTables.indonesia.json"
                },
                paging: false,
                scrollX: true,
                scrollY: '20vh',
                scrollCollapse: true,
                pageLength: 5,
            });
        });

    }

    function selectDataOrganisasi(){

        $.get('{{ route('tableDataOrganisasi') }}', function(data){

            $('#showDataOrganisasi').html(data);
            $('#tableOrganisasiAdministrator').DataTable({
                "language": {
                    "url": "/otherAsset/language/dataTables.indonesia.json"
                },
                paging: false,
                width: '100%',
                scrollX: true,
                scrollY: '20vh',
                scrollCollapse: true,
                pageLength: 5,
            });
        });

    }

    $(document).ready(function(){
        selectDataAdmin();
        selectDataOrganisasi();
    });
</script>
@endsection
