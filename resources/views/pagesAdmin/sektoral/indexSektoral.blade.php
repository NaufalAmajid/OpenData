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
                            <td>{{ substr($item->deskripsi,0,15) . '...' }}</td>
                            <td><span
                                    class="fw-extrabold text-success">{{ $item->is_correct = 2 ? 'Published' : '' }}</span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" onclick="detailSektoral('{{ $item->kode_sektor }}')" data-bs-toggle="tooltip" title="Detail Sektoral"><i class="bi bi-file-earmark-medical-fill"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="placeModalDetailSektoral">

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

@section('js')
<script>
    $(document).ready(function () {

        $('#tableSektoral').DataTable({
            "language": {
                "url": "/otherAsset/language/dataTables.indonesia.json"
            }
        });

        $('.addDataSektoral').text(function(i, text) {
            return text == "" ? "Tambah Data Sektoral" :
                "Tabel Data Sektoral";
        });

        $('#formFileLogoSektoral').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#showLogoSektoral').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);

                $('#showLogoSektoral').show();
                $('#formFileLogoSektoral').removeClass('is-invalid');
                $('#formFileLogoSektoral').addClass('is-valid');
                $('.invalidInputFileSektoral').hide();

            } else {
                $('#showLogoSektoral').hide();
                $('#formFileLogoSektoral').removeClass('is-valid');
                $('#formFileLogoSektoral').addClass('is-invalid');
            }
        });

        $('.addDataSektoral').click(function() {
            $('.formAddSektoral').toggleClass('d-none');
            $('.tableDataSektoral').toggleClass('d-none');
            $('.addDataSektoral').text(function(i, text) {
                return text === "Tambah Data Sektoral" ? "Tabel Data Sektoral" :
                    "Tambah Data Sektoral";
            });
        });

        $('#formAddDataSektoral').submit(function(e) {
            e.preventDefault();
            const token = $('meta[name="csrf-token"]').attr('content');
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('addSektoral') }}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    const result = JSON.parse(data);
                    Swal.fire({
                        icon: result.status,
                        title: 'Menambahakan Data Sektoral',
                        html: `<table>
                                    <tr class="text-start">
                                        <td>Nama Sektoral</td>
                                        <td>:</td>
                                        <td>${result.data.nama_sektor}</td>
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
                        imageUrl: `{{ asset('images/sektoral/${result.data.logo_sektor}') }}`,
                        imageWidth: 200,
                        imageHeight: 200,
                        imageAlt: 'Logo Sektoral',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function(data) {
                    const result = JSON.parse(data.responseText);
                    const deskripsi = result.errors.deskripsiSektoral;
                    const nama = result.errors.namaSektoral;
                    const logo = result.errors.logoSektoral;

                    if (nama) {
                        $('#namaSektoral').addClass('is-invalid');
                        $('.invalidNamaSektoral').show();
                        $('.invalidNamaSektoral').text(nama);
                    } else {
                        $('#namaSektoral').removeClass('is-invalid');
                        $('#namaSektoral').addClass('is-valid');
                        $('.invalidNamaSektoral').hide();
                    }

                    if (deskripsi) {
                        $('#deskripsiSektoral').addClass('is-invalid');
                        $('.invalidDeskripsiSektoral').show();
                        $('.invalidDeskripsiSektoral').text(deskripsi);
                    } else {
                        $('#deskripsiSektoral').removeClass('is-invalid');
                        $('#deskripsiSektoral').addClass('is-valid');
                        $('.invalidDeskripsiSektoral').hide();
                    }

                    if (logo) {
                        $('#formFileLogoSektoral').addClass('is-invalid');
                        $('.invalidInputFileSektoral').show();
                        $('.invalidInputFileSektoral').text(logo);
                    }

                }
            });

        });
    });

    function detailSektoral(kodeSektor){
        $.get('{{ url('/sektoral/detailSektoral') }}/' + kodeSektor, function(data){
            $('#placeModalDetailSektoral').html(data);
            $('#modalDetailSektoral').modal('show');
            $('#editLogoSektoral').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#editShowLogoSektoral').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);

                    $('#editShowLogoSektoral').show();
                    $('#editLogoSektoral').removeClass('is-invalid');
                    $('#editLogoSektoral').addClass('is-valid');

                } else {
                    $('#editShowLogoSektoral').attr('src', '/images/assets/sektoral.png');
                }
            });
        })
    }
</script>
@endsection
