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
                                        <a href="#" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i></a>
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
                                <input type="text" class="form-control" placeholder="Nama Organisasi"
                                    name="namaOrganisasi" id="namaOrganisasi" autocomplete="off">
                                    <div class="invalid-feedback invalidNamaOrganisasi">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Alasan Menambahkan Organisasi</label>
                                <textarea class="form-control" placeholder="Tuliskan alasan menambahkan organisasi..." name="alasanTambahOrganisasi"
                                    rows="4" id="alasanTambahOrganisasi"></textarea>
                                    <div class="invalid-feedback invalidAlasanTambahOrganisasi">
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
