@extends('layout.adminLayout.layoutAdmin')

@section('content')

<div class="row py-4">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <i class="bi bi-kanban-fill fs-3"></i>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Dataset</h2>
                            <h3 class="fw-extrabold mb-1">452</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Dataset</h2>
                            <h3 class="fw-extrabold mb-2">452</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            <i class="bi bi-geo-alt-fill"></i>
                            Klaten, Jawa Tengah
                        </small>
                        <div class="small d-flex mt-1">
                            <div>Jumlah Dataset <i class="bi bi-graph-up-arrow text-success"></i> <span
                                    class="text-success fw-bolder">22%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                            <i class="bi bi-globe fs-3"></i>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Sektoral</h2>
                            <h3 class="mb-1">{{ $countSektoral }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Sektoral</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countSektoral }}</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            <i class="bi bi-geo-alt-fill"></i>
                            Klaten, Jawa Tengah
                        </small>
                        <div class="small d-flex mt-1">
                            <div>Jumlah Sektoral <i class="bi bi-graph-down-arrow text-danger"></i> <span
                                    class="text-danger fw-bolder">2%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                            <i class="bi bi-newspaper fs-3"></i>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5"> Organisasi</h2>
                            <h3 class="mb-1">{{ $countOrganisasi }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Organisasi</h2>
                            <h3 class="fw-extrabold mb-2">{{ $countOrganisasi }}</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            <i class="bi bi-geo-alt-fill"></i>
                            Klaten, Jawa Tengah
                        </small>
                        <div class="small d-flex mt-1">
                            <div>Jumlah Organisasi <i class="bi bi-graph-up-arrow text-success"></i> <span
                                    class="text-success fw-bolder">2%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Aktivitas Admin </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="col-auto">
                            <table class="table table-flush alignt-item-center" id="tableAktivitas">
                                <thead>
                                    <tr>
                                        <th class="border-bottom" scope="col">Nama</th>
                                        <th class="border-bottom" scope="col">Aktivitas</th>
                                        <th class="border-bottom" scope="col">Waktu</th>
                                        <th class="border-bottom" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($rowNotifikasi->count() > 0)
                                    @foreach ($rowNotifikasi as $item)
                                    <tr>
                                        <td> Admin {{ $item->nama_notifikator }}</td>
                                        <td> {!! $item->notifikasi !!}</td>
                                        <td> {{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            @switch($item->is_read)
                                            @case(0)
                                            <span class="badge badge-lg bg-warning">Belum Dibaca</span>
                                            @break
                                            @case(1)
                                            <span class="badge badge-lg bg-success">Sudah Dibaca</span>
                                            @break
                                            @default
                                            <span class="badge badge-lg bg-danger">Belum Dibaca</span>
                                            @endswitch
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h5 class="text-danger">Belum Ada Aktivitas</h5>
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="col-12 px-0 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="d-block">
                        <div class="h6 fw-normal text-gray mb-2">Total Data</div>
                        <h2 class="h3 fw-extrabold">452</h2>
                        <div class="small mt-2">
                            <span class="fas fa-angle-up text-success"></span>
                            <span class="text-success fw-bold">18.2%</span>
                        </div>
                    </div>
                    <div class="d-block ms-auto">
                        <div class="d-flex align-items-center text-end mb-2">
                            <span class="dot rounded-circle bg-gray-800 me-2"></span>
                            <span class="fw-normal small">July</span>
                        </div>
                        <div class="d-flex align-items-center text-end">
                            <span class="dot rounded-circle bg-secondary me-2"></span>
                            <span class="fw-normal small">August</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
