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
        <li class="breadcrumb-item {{ Request::is('sektoral') ? 'active' : ' ' }}"><a
                href="{{ route('sektoral') }}">Sektoral</a></li>
        <li class="breadcrumb-item"><a class="addDataSektoral"></a></li>
    </ol>
</nav>
{{-- THIS FOR TABLE SEKTORAL --}}
<div class="tableDataSektoral">
    <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Sektoral</h1>
            <p class="mb-0">Berikut daftar sektoral. <span class="fw-bold">Untuk penambahan dan
                    perubahan data sektoral
                    harap menunggu persetujuan administrator.</span></p>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="tableSektoral" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sektoral</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rowSektoral as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_sektor }}</td>
                            <td>{{ $item->deskripsi }}</td>
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

{{-- THIS FOR FORM Sektoral --}}
<div class="formAddSektoral d-none">
    <div class="row">
        <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Form Tambah Sektoral</h1>
                <p class="mb-0">Silahkan menambahkan data Sektoral. <span class="fw-bold">Untuk
                        penambahan dan
                        perubahan data Sektoral
                        harap menunggu persetujuan administrator.</span></p>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow components-section mb-4 col-lg-6 col-sm-6">
        <div class="card-body">
            <form action="javascript:void(0)" enctype="multipart/form-data" method="POST" id="formAddDataSektoral">
                @csrf
                <input type="hidden" name="pembuat" value="{{ Auth::user()->name }}">
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Nama Sektoral</label>
                            <input type="text" class="form-control" placeholder="Nama Sektoral" name="namaSektoral"
                                id="namaSektoral" autocomplete="off">
                            <div class="invalid-feedback invalidNamaSektoral">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Deskripsi Menambahkan Sektoral</label>
                            <textarea class="form-control" placeholder="Tuliskan deskripsi Sektoral..."
                                name="deskripsiSektoral" rows="4" id="deskripsiSektoral"></textarea>
                            <div class="invalid-feedback invalidDeskripsiSektoral">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Silahkan Masukkan Logo Sektoral</label>
                            <input class="form-control" type="file" id="formFileLogoSektoral" name="logoSektoral">
                            <div class="invalid-feedback invalidInputFileSektoral">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="form-group">
                            <div id="alertLogoSektoral"></div>
                            <img id="showLogoSektoral" src="/images/assets/insertHere.png" width="500" height="400">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="form-group">
                        <button class="btn btn-pill btn-outline-primary col-md-12 fs-6" type="submit"
                            id="btnSendSektoral"><i class="bi bi-reply-all fs-5"></i> Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    function test() {
        alert('test');
    }
</script>
