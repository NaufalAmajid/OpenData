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
                        <div class="col-auto" id="showDataAdmin">

                        </div>
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
                        <div class="col-auto" id="showDataOrganisasi">

                        </div>
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
                <form action="javascript:void(0)" method="POST" id="formAddNewAdmin">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap Admin" name="namaLengkap"
                                    id="namaLengkap" autocomplete="off">
                                <div class="invalid-feedback invalidNamaLengkap">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Organisasi</label>
                                <select class="form-select" id="organisasiAdmin" name="organisasiAdmin">
                                    <option value="" selected>--- Pilih Organisasi ---</option>
                                    @foreach ($rowOrganisasi as $item)
                                        <option value="{{ $item->kode_organisasi }}">{{ $item->nama_organisasi }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback invalidOrganisasiAdmin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Username Admin" name="username"
                                    id="username" autocomplete="off">
                                <div class="invalid-feedback invalidUsername">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Password" name="password"
                                    id="password" autocomplete="off">
                                <div class="invalid-feedback invalidPassword">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="chkIsAdmin" name="isAdmin" value="false">
                                <label class="form-check-label" for="chkIsAdmin">Apakah dia Seorang<span style="font-weight: bold;"> Administrator?</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="form-group">
                            <button class="btn btn-pill btn-outline-primary col-md-12 fs-6" type="submit"
                                id="btnSendOrganisasi"><i class="bi bi-reply-all fs-5"></i> Buat</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                <form action="javascript:void(0)" enctype="multipart/form-data" method="POST" id="formAddDataOrganisasi">
                    @csrf
                    <input type="hidden" name="pembuat" value="{{ Auth::user()->name }}">
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Nama Organisasi</label>
                                <input type="text" class="form-control" placeholder="Nama Organisasi" name="namaOrganisasi"
                                    id="namaOrganisasi" autocomplete="off">
                                <div class="invalid-feedback invalidNamaOrganisasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Deskripsi Organisasi</label>
                                <textarea class="form-control" placeholder="Tuliskan deskripsi organisasi..."
                                    name="deskripsiOrganisasi" rows="4" id="deskripsiOrganisasi"></textarea>
                                <div class="invalid-feedback invalidDeskripsiOrganisasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Silahkan Masukkan Logo Organisasi</label>
                                <input class="form-control" type="file" id="formFileLogoOrganisasi" name="logoOrganisasi">
                                <div class="invalid-feedback invalidInputFileOrganisasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                                <div id="alertLogoOrganisasi"></div>
                                <img id="showLogoOrganisasi" src="/images/assets/insertHere.png" width="500" height="400">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="form-group">
                            <button class="btn btn-pill btn-outline-primary col-md-12 fs-6" type="submit"
                                id="btnSendOrganisasi"><i class="bi bi-reply-all fs-5"></i> Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnHideModalOrganisasi" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="placeModalDetailAdmin">

</div>
@endsection

@section('js')
<script>

    $(document).ready(function(){

        $('#formFileLogoOrganisasi').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#showLogoOrganisasi').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);

                $('#showLogoOrganisasi').show();
                $('#formFileLogoOrganisasi').removeClass('is-invalid');
                $('#formFileLogoOrganisasi').addClass('is-valid');
                $('.invalidInputFileOrganisasi').hide();

            } else {
                $('#showLogoOrganisasi').hide();
                $('#formFileLogoOrganisasi').removeClass('is-valid');
                $('#formFileLogoOrganisasi').addClass('is-invalid');
            }
        });

        $('#formAddDataOrganisasi').submit(function(e) {
            e.preventDefault();
            const token = $('meta[name="csrf-token"]').attr('content');
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('addOrganisasi') }}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    const result = JSON.parse(data);
                    $('#modalAddOrganisasi').modal('hide').fadeOut(500).queue(function(next) {
                        $('#formAddDataOrganisasi')[0].reset();
                        $('#showLogoOrganisasi').attr('src', '/images/assets/insertHere.png');
                        Swal.fire({
                            icon: result.status,
                            title: 'Menambahakan Data Organisasi',
                            html: `<table>
                                        <tr class="text-start">
                                            <td>Nama Organisasi</td>
                                            <td>:</td>
                                            <td>${result.data.nama_organisasi}</td>
                                        </tr>
                                        <tr class="text-start">
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>${result.data.deskripsi}</td>
                                        </tr>
                                        <tr class="text-start">
                                            <td>Pembuat</td>
                                            <td>:</td>
                                            <td>${result.data.pembuat}</td>
                                        </tr>
                                </table>`,
                            imageUrl: `{{ asset('images/organisasi/${result.data.logo_organisasi}') }}`,
                            imageWidth: 200,
                            imageHeight: 200,
                            imageAlt: 'Logo Organisasi',
                        }).then((result) => {
                            if (result.isConfirmed) {

                                selectDataOrganisasi();

                            }
                        });
                        next();
                    });
                },
                error: function(data) {
                    const result = JSON.parse(data.responseText);
                    const deskripsi = result.errors.deskripsiOrganisasi;
                    const nama = result.errors.namaOrganisasi;
                    const logo = result.errors.logoOrganisasi;

                    if (nama) {
                        $('#namaOrganisasi').addClass('is-invalid');
                        $('.invalidNamaOrganisasi').show();
                        $('.invalidNamaOrganisasi').text(nama);
                    } else {
                        $('#namaOrganisasi').removeClass('is-invalid');
                        $('#namaOrganisasi').addClass('is-valid');
                        $('.invalidNamaOrganisasi').hide();
                    }

                    if (deskripsi) {
                        $('#deskripsiOrganisasi').addClass('is-invalid');
                        $('.invalidDeskripsiOrganisasi').show();
                        $('.invalidDeskripsiOrganisasi').text(deskripsi);
                    } else {
                        $('#deskripsiOrganisasi').removeClass('is-invalid');
                        $('#deskripsiOrganisasi').addClass('is-valid');
                        $('.invalidDeskripsiOrganisasi').hide();
                    }

                    if (logo) {
                        $('#formFileLogoOrganisasi').addClass('is-invalid');
                        $('.invalidInputFileOrganisasi').show();
                        $('.invalidInputFileOrganisasi').text(logo);
                    }
                }
            });

        });

        $('#chkIsAdmin').on('click', function() {
            if ($(this).is(':checked')) {
                $('#chkIsAdmin').val(true);
            }else if ($(this).is(":not(:checked)")) {
                $('#chkIsAdmin').val(false);
            }
        });

        $('#formAddNewAdmin').submit(function(e) {
            e.preventDefault();
            const token = $('meta[name="csrf-token"]').attr('content');
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('addNewAdmin') }}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                    const result = JSON.parse(response);
                    $('#modalAddAdmin').modal('hide').fadeOut(500).queue(function(next) {
                        $('#formAddNewAdmin')[0].reset();
                        Swal.fire({
                            icon: result.status,
                            title: `Admin ${result.data.name} berhasil ditambahkan`,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                selectDataAdmin();
                            }
                        });
                        next();
                    });
                    console.log(result);
                },
                error: function(message) {
                    const result = JSON.parse(message.responseText);
                    const error = result.errors;
                    const nama = error.namaLengkap;
                    const org = error.organisasiAdmin;
                    const pass = error.password;
                    const user = error.username;

                    if (nama) {
                        $('.invalidNamaLengkap').show();
                        $('.invalidNamaLengkap').text(nama);
                        $('#namaLengkap').addClass('is-invalid');
                        $('#namaLengkap').removeClass('is-valid');
                    }else{
                        $('#namaLengkap').removeClass('is-invalid');
                        $('#namaLengkap').addClass('is-valid');
                        $('.invalidNamaLengkap').hide();
                    }

                    if (org) {
                        $('.invalidOrganisasiAdmin').show();
                        $('.invalidOrganisasiAdmin').text(org);
                        $('#organisasiAdmin').addClass('is-invalid');
                        $('#organisasiAdmin').removeClass('is-valid');
                    }else{
                        $('#organisasiAdmin').removeClass('is-invalid');
                        $('#organisasiAdmin').addClass('is-valid');
                        $('.invalidOrganisasiAdmin').hide();
                    }

                    if (pass) {
                        for(let i = 0; i < pass.length; i++){
                            $('.invalidPassword').html(`<li>${pass[i]}</li>`);
                        }
                        $('.invalidPassword').show();
                        $('#password').addClass('is-invalid');
                        $('#password').removeClass('is-valid');

                    }else{
                        $('#password').removeClass('is-invalid');
                        $('#password').addClass('is-valid');
                        $('.invalidPassword').hide();
                    }

                    if (user) {
                        $('.invalidUsername').show();
                        $('.invalidUsername').text(user);
                        $('#username').addClass('is-invalid');
                        $('#username').removeClass('is-valid');
                    }else{
                        $('#username').removeClass('is-invalid');
                        $('#username').addClass('is-valid');
                        $('.invalidUsername').hide();
                    }


                },


            });

        });

        selectDataAdmin();
        selectDataOrganisasi();
    });

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

    function detailAdmin(id){
        $.get('{{ url('/administrator/detailAdmin') }}/' + id, function(data){
            $('#placeModalDetailAdmin').html(data);
            $('#modalDetailAdmin').modal('show');
        });
    }

</script>
@endsection
