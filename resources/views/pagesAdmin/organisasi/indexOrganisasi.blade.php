@extends('layout.adminLayout.layoutAdmin')

@section('content')
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
        <li class="breadcrumb-item {{ Request::is('organisasi') ? 'active' : ' ' }}"><a
                href="{{ route('organisasi') }}">Organisasi</a></li>
        <li class="breadcrumb-item"><a class="addDataOrganisasi"></a></li>
    </ol>
</nav>
{{-- THIS FOR TABLE ORGANISASI --}}
<div class="tableDataOrganisasi">
    <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Organisasi</h1>
            <p class="mb-0">Berikut daftar organisasi. <span class="fw-bold">Untuk penambahan dan
                    perubahan data organisasi
                    harap menunggu persetujuan administrator.</span></p>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="tableOrganisasi" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rowOrganisasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_organisasi }}</td>
                            <td><span
                                    class="fw-extrabold text-success">{{ $item->is_correct = 2 ? 'Published' : '' }}</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" onclick="test()" @if ($item->pembuat !=
                                    Auth::user()->name) style="cursor: not-allowed; pointer-events:none" @endif><i
                                        class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- THIS FOR FORM ORGANISASI --}}
<div class="formAddOrganisasi d-none">
    <div class="row">
        <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Form Tambah Organisasi</h1>
                <p class="mb-0">Silahkan menambahkan data organisasi. <span class="fw-bold">Untuk
                        penambahan dan
                        perubahan data organisasi
                        harap menunggu persetujuan administrator.</span></p>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow components-section mb-4 col-lg-6 col-sm-6">
        <div class="card-body">
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
                            <label class="form-label">Deskripsi Menambahkan Organisasi</label>
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
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        $('#tableOrganisasi').DataTable({
            "language": {
                "url": "/otherAsset/language/dataTables.indonesia.json"
            }
        });

        $('.addDataOrganisasi').text(function(i, text) {
            return text == "" ? "Tambah Data Organisasi" :
                "Tabel Data Organisasi";
        });

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

        $('.addDataOrganisasi').click(function() {
            $('.formAddOrganisasi').toggleClass('d-none');
            $('.tableDataOrganisasi').toggleClass('d-none');
            $('.addDataOrganisasi').text(function(i, text) {
                return text === "Tambah Data Organisasi" ? "Tabel Data Organisasi" :
                    "Tambah Data Organisasi";
            });
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
                            window.location.reload();
                        }
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

    });

    function test() {
        alert('test');
    }
</script>
@endsection
