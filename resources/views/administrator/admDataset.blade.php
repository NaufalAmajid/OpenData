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
            <li class="breadcrumb-item"><a href="{{ route('admDataset') }}">Kelola Dataset</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Halaman Kelola Dataset.</h1>
            <p class="mb-0">Silahkan menyetujui atau tidak terhadap beberapa data yang ditambahkan oleh admin dari
                beberapa organisasi.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Tabel Daftar Dataset </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush alignt-item-center" id="tableDataset">
                            <thead>
                                <tr>
                                    <th class="border-bottom" scope="col">Judul</th>
                                    <th class="border-bottom" scope="col">Creator</th>
                                    <th class="border-bottom" scope="col">Tgl Buat</th>
                                    <th class="border-bottom" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="showDataset">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                                <h2 class="fs-5 fw-bold mb-0">Tabel Daftar Tags </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush alignt-item-center" id="tableDataTags">
                            <thead>
                                <tr>
                                    <th class="border-bottom" scope="col">Tag</th>
                                    <th class="border-bottom" scope="col">Creator</th>
                                    <th class="border-bottom" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="showDataTags">

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
                                <h2 class="fs-5 fw-bold mb-0">Tabel Daftar Sektoral </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush alignt-item-center" id="tableDataSektoral">
                            <thead>
                                <tr>
                                    <th class="border-bottom" scope="col">Sektoral</th>
                                    <th class="border-bottom" scope="col">Creator</th>
                                    <th class="border-bottom" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="showDataSektoral">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        selectDataTags();
        selectDataSektoral();
        selectDataset();
    });

    function selectDataTags() {
        $.get('{{ route('tableDataTags') }}',
            function (data) {
                $('#showDataTags').html(data);
                DataTables('#tableDataTags');
            })
    }

    function selectDataSektoral() {
        $.get('{{ route('tableDataSektoral') }}',
            function (data) {
                $('#showDataSektoral').html(data);
                DataTables('#tableDataSektoral');
            })
    }

    function selectDataset() {
        $.get('{{ route('tableDataset') }}',
            function (data) {
                $('#showDataset').html(data);
                DataTables('#tableDataset');
            })
    }

    function DataTables(param) {
        $(param).DataTable({
            "language": {
                "url": "/otherAsset/language/dataTables.indonesia.json"
            },
            paging: false,
            scrollX: false,
            scrollY: '20vh',
            scrollCollapse: true,
            pageLength: 5,
        });
    }

</script>
@endsection
