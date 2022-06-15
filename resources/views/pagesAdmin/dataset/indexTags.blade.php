@extends('layout.adminLayout.layoutAdmin')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent mb-0">
        <li class="breadcrumb-item">
            <a href="#">
                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
            </a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('tags') }}">Tags</a></li>
    </ol>
</nav>
<div class="row">
    <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Tags Dataset</h1>
            <p class="mb-0">Halaman ini merupakan daftar untuk mengelola tags <span class="fw-bold">Dataset.</span>
                bila ada penambahan data dan perubahan harap tunggu persetujuan Administrator</p>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Form Tags </h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="javascript:void(0)" method="POST" id="formTags">
                            @csrf
                            <div class="row mb-3">
                                <label for="nameOfTags">Nama Tag</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nameOfTags" placeholder="Nama Tag ..."
                                        name="namaTags" autocomplete="off">
                                    <input type="hidden" name="pembuat" value="{{ Auth::user()->kode_admin }}">
                                    <span class="input-group-text" id="basic-addon3">
                                        <i class="bi bi-bookmark-check-fill"></i>
                                    </span>
                                    <div class="invalid-feedback invalidToNamaTag"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group">
                                    <button class="btn btn-pill btn-outline-info col-lg-12" type="submit"><i class="bi bi-plus-lg"></i> Tambahkan</button>
                                </div>
                            </div>
                        </form>
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
                                <h2 class="fs-5 fw-bold mb-0">Tabel Tags <span class="d-none" id="loaderEditTag"> <img src="/images/assets/loader.gif" alt="loader Tag"></span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="col-auto" id="showTableTags">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){

        $('#formTags').submit(function(e) {
            e.preventDefault();
            const token = $('meta[name="csrf-token"]').attr('content');
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('addTags') }}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    const result = JSON.parse(response);
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: true,
                        color: '#fff',
                        background: '#a5dc86',
                    }).fire({
                        icon: result.status,
                        title: result.message
                    }).then((result) => {
                        selectTag();
                        $('#formTags')[0].reset();
                        $('.invalidToNamaTag').hide();
                        $('#nameOfTags').removeClass('is-invalid');
                    });
                },
                error: function(data) {
                    const result = JSON.parse(data.responseText);
                    const tag = result.errors.namaTags;
                    $('.invalidToNamaTag').text(tag);
                    $('.invalidToNamaTag').show();
                    $('#nameOfTags').addClass('is-invalid');
                }
            });
        });

        selectTag();
    });

    function selectTag(){
        $.get('{{ route('readTags') }}', function(data){
            $('#showTableTags').html(data);
            $('#tableTags').DataTable({
                "language": {
                    "url": "/otherAsset/language/dataTables.indonesia.json"
                },
                paging: false,
                width: '100%',
                scrollX: true,
                scrollY: '30vh',
                scrollCollapse: true,
                pageLength: 5,
            });
        });
    }

    function showDataToEditTag(id){

        const token = $('meta[name="csrf-token"]').attr('content');
        const namaTag = $('#namaTagUpdate-' + id).val();

        $.ajax({
            type: 'POST',
            url: '{{ route('editTag') }}',
            data: {
                '_token': token,
                'id': id,
                'namaTag': namaTag
            },
            beforeSend: function(){
                $('#namaTagUpdate-' + id).attr('readonly', true);
                $('#loaderEditTag').removeClass('d-none');
            },
            success: function(response){
                const result = JSON.parse(response);
                $('#loaderEditTag').addClass('d-none');
                const notyf = new Notyf({
                    position: {
                        x: 'right',
                        y: 'top',
                    },
                    types: [
                        {
                            type: 'info',
                            background: '#0948B3',
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
                    message: 'Tag berhasil diubah'
                });
                selectTag();
            },
            error: function(data){
                const message = JSON.parse(data);
                console.log(message);
            }
        })

    }

    function alertNotUpdate(){
        const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
            types: [
                {
                    type: 'error',
                    background: '#FA5252',
                    icon: {
                        className: 'fas fa-times',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }
            ]
        });
        notyf.open({
            type: 'error',
            message: 'Edit gagal anda bukan creator tag ini.'
        });
    }
</script>
@endsection
