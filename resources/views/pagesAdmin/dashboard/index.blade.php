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
                                <h3 class="fw-extrabold mb-1">345,678</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Dataset</h2>
                                <h3 class="fw-extrabold mb-2">345k</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                <i class="bi bi-geo-alt-fill"></i>
                                Klaten, Jawa Tengah
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Jumlah Dataset pada sistem <i class="bi bi-graph-up-arrow text-success"></i> <span
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
                                <h3 class="mb-1">$43,594</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Sektoral</h2>
                                <h3 class="fw-extrabold mb-2">$43,594</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                <i class="bi bi-geo-alt-fill"></i>
                                Klaten, Jawa Tengah
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Presentase jumlah Sektoral <i class="bi bi-graph-down-arrow text-danger"></i> <span
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
                                    <h2 class="fs-5 fw-bold mb-0">Activitas Admin</h2>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">Nama</th>
                                        <th class="border-bottom" scope="col">Activitas</th>
                                        <th class="border-bottom" scope="col">Waktu</th>
                                        <th class="border-bottom" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="test">
                                        <th class="text-gray-900" scope="row">
                                            /demo/admin/index.html
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            3,225
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            $20
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <div class="d-flex">
                                                <svg class="icon icon-xs text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                42,55%
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            /demo/admin/forms.html
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            2,987
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            0
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <div class="d-flex">
                                                <svg class="icon icon-xs text-success me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                43,24%
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            /demo/admin/util.html
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            2,844
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            294
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <div class="d-flex">
                                                <svg class="icon icon-xs text-success me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                32,35%
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            /demo/admin/validation.html
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            2,050
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            $147
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <div class="d-flex">
                                                <svg class="icon icon-xs text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                50,87%
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            /demo/admin/modals.html
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            1,483
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            $19
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <div class="d-flex">
                                                <svg class="icon icon-xs text-success me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                26,12%
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
