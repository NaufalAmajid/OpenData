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
                        <div class="col-auto" id="showDataset">

                        </div>
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
                                <h2 class="fs-5 fw-bold mb-0">Tabel Daftar Tags <span class="d-none loaderAcceptTags"><img src="/images/assets/loader.gif"></span> </h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="col-auto" id="showDataTags">

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-item-center">
                            <div class="col-lg-4 col-sm-12">
                                <span class="p-2" style="font-size: 13px;"><i class="bi bi-clipboard-minus-fill text-warning fs-5"></i> Belum diSetujui</span>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <span class="p-2" style="font-size: 13px;"><i class="bi bi-clipboard-check-fill text-success fs-5"></i> diSetujui</span>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <span class="p-2" style="font-size: 13px;"><i class="bi bi-trash text-danger fs-5"></i> Hapus Tag</span>
                            </div>
                        </div>
                        <div role="separator" class="row dropdown-divider mt-4 mb-3 border-dark"></div>
                        <div class="row">
                            <p class="p-2" style="font-size: 14px;">Klik tombol <span style="font-weight: bold; font-style: italic;">"Belum diSetujui"</span> untuk menampilkan Tag</p>
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
                $('#tableDataset').DataTable({
                    "language": {
                        "url": "/otherAsset/language/dataTables.indonesia.json"
                    },
                    paging: false,
                    scrollX: false,
                    scrollY: '50vh',
                    scrollCollapse: true,
                    pageLength: 5,
                });
            })
    }

    function DataTables(param) {
        $(param).DataTable({
            "language": {
                "url": "/otherAsset/language/dataTables.indonesia.json"
            },
            paging: false,
            scrollX: false,
            scrollY: '50vh',
            scrollCollapse: true,
            pageLength: 5,
        });
    }

    function updateToPublished(id, number){
        $('#loaderPublished-' + number).removeClass('d-none');
        $('#statusPublished-' + number).addClass('d-none');
        $.ajax({
            url: '{{ route('acceptDataset') }}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id
            },
            success: function (data) {
                selectDataset();
            },
            error: function (data) {
                const res = JSON.parse(data);
                console.error(res);
            }
        });
    }

    function updateTagAccept(id){

        $.ajax({
            type: 'POST',
            url: '{{ route('acceptTag') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'idTag': id
            },
            beforeSend: function () {
                $('.loaderAcceptTags').removeClass('d-none');
            },
            success: function (data) {
                selectDataTags();
                $('.loaderAcceptTags').addClass('d-none');
            },
            error: function (data) {
                const res = JSON.parse(data);
                console.error(res);
            }
        })
    }

    function deleteTag(id, kode){

        $.ajax({
            type: 'POST',
            url: '{{ route('checkBfrDelTag') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'kodeTag': kode
            },
            beforeSend: function () {
                $('.loaderAcceptTags').removeClass('d-none');
            },
            success: function (data) {

                const res = JSON.parse(data);

                if(res.status == 'success'){

                    Swal.fire({
                      title: 'Apakah anda yakin?',
                      text: "Tag ini akan dihapus permanent!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Ya',
                      cancelButtonText: 'Tidak'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('delTag') }}',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'idTag': id,
                                'kodeTag': kode
                            },
                            success: function (data) {
                                const notyf = new Notyf({
                                    position: {
                                        x: 'right',
                                        y: 'top',
                                    },
                                    types: [
                                        {
                                            type: 'info',
                                            background: '#12c40c',
                                            icon: {
                                                className: 'fas fa-info-circle',
                                                tagName: 'span',
                                                color: '#fff'
                                            },
                                            dismissible: false
                                        }
                                    ]
                                });
                                notyf.open({
                                    type: 'info',
                                    message: 'Tag berhasil dihapus'
                                });
                                selectDataTags();
                                $('.loaderAcceptTags').addClass('d-none');
                            },
                            error: function (data) {
                                const res = JSON.parse(data);
                                console.error(res);
                            }
                        });
                      }else{
                        $('.loaderAcceptTags').addClass('d-none');
                      }
                    })



                }else{

                    $('.loaderAcceptTags').addClass('d-none');
                    const notyf = new Notyf({
                        position: {
                            x: 'right',
                            y: 'top',
                        },
                        types: [
                            {
                                type: 'error',
                                background: '#f02222',
                                icon: {
                                    className: 'fas fa-info-circle',
                                    tagName: 'span',
                                    color: '#fff'
                                },
                                dismissible: false
                            }
                        ]
                    });
                    notyf.open({
                        type: 'error',
                        message: 'Tag tidak dapat dihapus, karena masih ada dataset yang menggunakan tag ini',
                        duration: 3000
                    });

                }


            },
            error: function (data) {
                const res = JSON.parse(data);
                console.error(res);
            }
        })
    }

</script>
@endsection
