@extends('layout.adminLayout.layoutAdmin')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
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
        <li class="breadcrumb-item active"><a href="#">Dataset</a></li>
    </ol>
</nav>
<div class="py-4">
    <button class="btn btn-gray-800 d-inline-flex align-items-center me-2" id="optionMenuDataset">
        <div class="showFormDataset">
            <i class="bi bi-plus-circle icon icon-xs me-2"></i>
            Buat Dataset Baru
        </div>
        <div class="showTabelDataset d-none">
            <i class="bi bi-grid-3x3 icon icon-xs me-2"></i>
            Tabel Dataset
        </div>
    </button>
</div>

{{-- THIS FORM DATASET --}}
<div class="formDataset d-none">
    <div class="row">
        <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Form Buat Dataset</h1>
                <p class="mb-0">Silahkan membuat Dataset baru diform bawah ini. <span class="fw-bold">Untuk
                        penambahan dan
                        perubahan Dataset harus atas persetujuan administrator.</span></p>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow components-section mb-4 col-lg-12 col-sm-12">
        <div class="card-body">
            <form action="javascript:void(0)" enctype="multipart/form-data" method="POST" id="formCreateDataset">
                @csrf
                <input type="hidden" name="pembuat" value="{{ Auth::user()->kode_admin }}">
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Judul Dataset</label>
                            <input type="text" class="form-control" placeholder="Judul Dataset" name="judulDataset"
                                id="judulDataset" autocomplete="off">
                            <div class="invalid-feedback invalidJudulDataset">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Organisasi</label>
                            <input type="text" class="form-control" placeholder="Organisasi Dataset" name="organisasiDataset"
                            id="organisasiDataset" value="{{ $organisasiName->nama_organisasi }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label class="my-1 me-2" for="sektoralDataset">Sektoral</label>
                            <select class="form-select" id="sektoralDataset" name="sektoralDataset">
                                <option value="" selected>--- Pilih Sektoral ---</option>
                                @foreach ($sektoral as $item)
                                    <option value="{{ $item->kode_sektor }}">{{ $item->nama_sektor }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback invalidSektoralDataset">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label class="my-1 me-2" for="tagDataset">Tag</label>
                            <select class="form-select" id="tagDataset" name="tagDataset">
                                <option value="" selected>--- Pilih Tag ---</option>
                                @foreach ($tag as $item)
                                    <option value="{{ $item->kode_tag }}">{{ $item->nama_tag }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback invalidTagDataset">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Silahkan Masukkan Data dan Resources</label>
                            <input class="form-control" type="file" id="dataResources" name="dataResources[]" multiple>
                            <div class="invalid-feedback invalidDataResources">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="form-group">
                            <div id="alertDataResources"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <hr>
                </div>
                <div class="informasiTambahan">
                    <div class="row mb-4">
                        <h5>Form Informasi Tambahan</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label class="my-1 me-2" for="sumberDataset">Sumber Dataset</label>
                                <input class="form-control" type="text" id="sumberDataset" name="sumberDataset"
                                    placeholder="Sumber Dataset" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label class="my-1 me-2" for="pengelolaDataset">Pengelola Dataset</label>
                                <input class="form-control" type="text" id="pengelolaDataset" name="pengelolaDataset"
                                    placeholder="Pengelola Dataset" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label class="my-1 me-2" for="lisensiDataset">Lisensi Dataset</label>
                                <input class="form-control" type="text" id="lisensiDataset" name="lisensiDataset"
                                    placeholder="Lisensi Dataset" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <button class="btn btn-pill btn-outline-primary col-md-12 fs-6" type="submit"
                            id="btnSendDataset"><i class="bi bi-file-plus-fill fs-5"></i> Buat Dataset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- THIS FOR TABLE DATASET --}}
<div class="tableDataset">
    <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Dataset</h1>
            <p class="mb-0">Berikut daftar sektoral. <span class="fw-bold">Untuk penambahan dan
                    perubahan data sektoral
                    harap menunggu persetujuan administrator.</span></p>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="showTableDataset"></div>
            </div>
        </div>
    </div>
</div>

{{-- {{ THIS FOR DETAIL DATASET }} --}}
<div id="showDetailDataset">
</div>
<div id="placeModalPreview">
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {

        $('#optionMenuDataset').click(function() {
            $('.formDataset, .showTabelDataset, .showFormDataset, .tableDataset').toggleClass('d-none');
            $('#showDetailDataset').html('');
        });

        $('#formCreateDataset').submit(function(e) {
            e.preventDefault();
            const token = $('meta[name="csrf-token"]').attr('content');
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('createDataset') }}',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    const result = JSON.parse(response);
                    if (result.status == 'success') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: result.message,
                            icon: 'success'
                        }).then(function() {
                            // location.reload();
                            $('#formCreateDataset')[0].reset();
                            $('.formDataset, .showTabelDataset, .showFormDataset, .tableDataset').toggleClass('d-none');
                            $('#showDetailDataset').html('');

                            showDataDataset();
                        });
                    }
                },
                error: function(response) {
                    const result = JSON.parse(response.responseText);

                    const judul = result.errors.judulDataset;
                    const sektoral = result.errors.sektoralDataset;
                    const tag = result.errors.tagDataset;

                    if (judul) {
                        $('#judulDataset').addClass('is-invalid');
                        $('#judulDataset').removeClass('is-valid');
                        $('.invalidJudulDataset').text(judul);
                        $('.invalidJudulDataset').show();
                    } else {
                        $('#judulDataset').removeClass('is-invalid');
                        $('#judulDataset').addClass('is-valid');
                        $('.invalidJudulDataset').hide();
                    }

                    if (sektoral) {
                        $('#sektoralDataset').addClass('is-invalid');
                        $('#sektoralDataset').removeClass('is-valid');
                        $('.invalidSektoralDataset').text(sektoral);
                        $('.invalidSektoralDataset').show();
                    } else {
                        $('#sektoralDataset').removeClass('is-invalid');
                        $('#sektoralDataset').addClass('is-valid');
                        $('.invalidSektoralDataset').hide();
                    }

                    if (tag) {
                        $('#tagDataset').addClass('is-invalid');
                        $('#tagDataset').removeClass('is-valid');
                        $('.invalidTagDataset').text(tag);
                        $('.invalidTagDataset').show();
                    } else {
                        $('#tagDataset').removeClass('is-invalid');
                        $('#tagDataset').addClass('is-valid');
                        $('.invalidTagDataset').hide();
                    }

                }
            });

        });

        showDataDataset();

    });

    function showDataDataset(){
        $.get('{{ route('showDataDataset') }}', function(data){
            $('#showTableDataset').html(data);
            $('#tableDataset').DataTable({
                "language": {
                    "url": "/otherAsset/language/dataTables.indonesia.json"
                }
            });
        })
    }

    function detailDataset(id){

        $.get('{{ url('/dataset/detailDataset') }}/' + id, function(data){
            $('#showDetailDataset').html(data);
        })
    }

    function editFile(idFile, row, idDataset){
        var value = $('#editFileDataset'+row)[0].files[0];

        if(value != undefined){
            $('#btnEditFileDataset'+row).removeClass('d-none');
            $('#btnEditFileDataset'+row).attr('onclick', 'updateFile('+idFile+', '+row+', '+idDataset+')');
        }else{
            $('#btnEditFileDataset'+row).addClass('d-none');
        }
    }

    function updateFile(id, row, idDataset){
        //action update file
        $('#btnSpinEditFileDataset'+row).removeClass('d-none');
        $('#btnEditFileDataset'+row).addClass('d-none');

        //data to send
        var value = $('#editFileDataset'+row)[0].files[0];
        var formData = new FormData();
        formData.append('file', value);
        formData.append('idFile', id);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'POST',
            url: '{{ route('editFileDataset') }}',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: response => {
                $('#btnSpinEditFileDataset'+row).addClass('d-none');
                $('#editFileDataset'+row).val('');
                detailDataset(idDataset);
                const notyf = new Notyf({
                    position: {
                        x: 'left',
                        y: 'top',
                    },
                    types: [
                        {
                            type: 'success',
                            background: '#0b49e6',
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
                    type: 'success',
                    message: 'File Dataset Berhasil diUpdate.'
                });
            },
            error: response => {
                console.log(response);
            }
        })
    }

    function showModalAddLink(idFile, idDataset, linkOld){
        $('#modalAddLink').modal('show');
        $('#btnAddLink').attr('onclick', 'addLink('+idFile+', '+idDataset+')');
        $('#oldLink').attr('href', linkOld).text('Link lama : ' + linkOld);
    }

    function addLink(idFile, idDataset){
        var link = $('#linkGdriveFile').val();
        var formData = new FormData();
        formData.append('link', link);
        formData.append('idFile', idFile);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'POST',
            url: '{{ route('addLink') }}',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: response => {
                $('#modalAddLink').modal('hide').queue(function(){

                    $('#linkGdriveFile').val('');
                    detailDataset(idDataset);
                    const notyf = new Notyf({
                        position: {
                            x: 'left',
                            y: 'top',
                        },
                        types: [
                            {
                                type: 'success',
                                background: '#0b49e6',
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
                        type: 'success',
                        message: 'Link File Berhasil ditambahkan.'
                    });
                });
            },
            error: response => {
                console.log(response);
            }
        })
    }

    function deleteDataset(idDataset){
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data Dataset ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('deleteDataset') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'idDataset': idDataset
                    },
                    success: response => {
                        const notyf = new Notyf({
                            position: {
                                x: 'left',
                                y: 'top',
                            },
                            types: [
                                {
                                    type: 'success',
                                    background: '#0b49e6',
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
                            type: 'success',
                            message: 'Data Dataset Berhasil dihapus.'
                        });
                        showDataDataset();
                        $('#showDetailDataset').html('');

                    }
                });
            }
        });
    }

    function addNewFileDataset(kodeDataset, idDataset){
        var value = $('#addFileDataset')[0].files[0];

        if(value != undefined){
            $('#btnAddNewFileDataset').removeClass('d-none');
            $('#btnAddNewFileDataset').attr('onclick', `submitNewFileDataset('${kodeDataset}', ${idDataset})`);
        }else{
            $('#btnAddNewFileDataset').addClass('d-none');
        }

    }

    function submitNewFileDataset(kodeDataset, idDataset){
        var value = $('#addFileDataset')[0].files[0];
        var formData = new FormData();
        formData.append('file', value);
        formData.append('kodeDataset', kodeDataset);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'POST',
            url: '{{ route('addNewFileDataset') }}',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: res => {
                $('#addFileDataset').val('');
                $('#btnAddNewFileDataset').addClass('d-none');
                detailDataset(idDataset);
                const notyf = new Notyf({
                    position: {
                        x: 'left',
                        y: 'top',
                    },
                    types: [
                        {
                            type: 'success',
                            background: '#0b49e6',
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
                    type: 'success',
                    message: 'File Dataset Berhasil ditambahkan.'
                });
            },
            error: err => {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'File gagal diunggah.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
                console.log(err);
            }
        })
    }

    function showBtnEditInformation(idDataset){
        $('#btnEditInformationDataset').removeClass('d-none');
        $('#btnEditInformationDataset').attr('onclick', `editInformation('${idDataset}')`);
    }

    function editInformation(idDataset){

        $('#btnSpinEditInformationDataset').removeClass('d-none');
        $('#btnEditInformationDataset').addClass('d-none');

        const judul = $('#editJudulDataset').val();
        const sektoral = $('#editSektoralDataset').val();
        const tag = $('#editTagDataset').val();
        const sumber = $('#editSumberDataset').val();
        const pengelola = $('#editPengelolaDataset').val();
        const lisensi = $('#editLisensiDataset').val();
        const versi = $('#editVersiDataset').val();
        const formData = new FormData();
        formData.append('idDataset', idDataset);
        formData.append('judul', judul);
        formData.append('sektoral', sektoral);
        formData.append('tag', tag);
        formData.append('sumber', sumber);
        formData.append('pengelola', pengelola);
        formData.append('lisensi', lisensi);
        formData.append('versi', versi);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'POST',
            url: '{{ route('editInformationDataset') }}',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: response => {
                const notyf = new Notyf({
                    position: {
                        x: 'left',
                        y: 'top',
                    },
                    types: [
                        {
                            type: 'success',
                            background: '#0b49e6',
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
                    type: 'success',
                    message: 'Data Dataset Berhasil diubah.'
                });
                $('#btnSpinEditInformationDataset').removeClass('d-none');
                detailDataset(idDataset);
            },
        })
    }
</script>
@endsection
