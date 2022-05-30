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
        <li class="breadcrumb-item {{ Request::is('organisasi') ? 'active' : ' ' }}"><a href="{{ route('organisasi') }}">Organisasi</a></li>
        <li class="breadcrumb-item {{ Request::is('organisasi/createOrganisasi') ? 'active' : ' ' }}"><a href="{{ route('createOrganisasi') }}">Tambah Organisasi</a></li>
    </ol>
</nav>
<div class="d-flex justify-content-between w-100 flex-wrap mb-3">
    <div class="mb-3 mb-lg-0">
        <h1 class="h4">Daftar Organisasi</h1>
        <p class="mb-0">Berikut daftar organisasi. <span class="fw-bold">Untuk penambahan dan perubahan data organisasi
                harap menunggu persetujuan administrator.</span></p>
    </div>
</div>
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <td><span class="fw-extrabold text-success">{{ $item->is_correct = 2 ? 'Published' : '' }}</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
