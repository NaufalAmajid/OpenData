<div class="modal fade" id="modalDetailDataset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-xl-9">
                        <div class="card shadow border-0 p-4 p-md-5 position-relative">
                            <div class="d-flex justify-content-between pb-4 pb-md-5 mb-4 mb-md-5 border-bottom border-light">
                                @if ($rowDataset->logo_organisasi != '')
                                    <img class="image-lg" src="{{ asset('images/organisasi/'.$rowDataset->logo_organisasi) }}" height="150" width="200"
                                    alt="Logo Organisasi">
                                @else
                                    <img class="image-lg" src="/images/assets/organisasi.png" height="150" width="200"
                                    alt="Logo Organisasi">
                                @endif
                                <div class="px-4">
                                    <h5>{{ $rowDataset->nama_organisasi }}</h5>
                                    <ul class="list-group simple-list">
                                        <li class="list-group-item fw-normal">{{ $rowDataset->deskOrg }}</li>
                                        <li class="list-group-item fw-normal">{{ \Carbon\Carbon::parse($rowDataset->tglCreateOrg)->format('Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-6 d-flex align-items-center justify-content-center">
                                <h2 class="h4 mb-0">
                                        {{ $rowDataset->judul_dataset }}
                                </h2>
                                @switch($rowDataset->is_publish)
                                    @case(1)
                                        <span class="badge badge-lg bg-success ms-4">Publish</span>
                                        @break
                                    @case(0)
                                        <span class="badge badge-lg bg-danger ms-4">Unpublish</span>
                                        @break
                                    @default
                                        <span class="badge badge-lg bg-primary ms-4">Unknow Status</span>
                                        @break
                                @endswitch
                            </div>
                            <div class="row justify-content-between mb-4 mb-md-5">
                                <div class="col-sm">
                                    <h5>Detail :</h5>
                                    <div>
                                        <ul class="list-group simple-list">
                                            <li class="list-group-item fw-normal">Pembuat : {{ $rowDataset->name }}</li>
                                            <li class="list-group-item fw-normal">
                                                    Sektoral : {{ $rowDataset->nama_sektor }}
                                            </li>
                                            <li class="list-group-item fw-normal">
                                                    Tag : {{ $rowDataset->nama_tag }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm col-lg-4">
                                    <dl class="row text-sm-right">
                                        <dt class="col-6"><strong>Kode Dataset : </strong></dt>
                                        <dd class="col-6">{{ $rowDataset->kode_dataset }}</dd>
                                        <dt class="col-6"><strong>Tgl diBuat :</strong></dt>
                                        <dd class="col-6">{{ \Carbon\Carbon::parse($rowDataset->tglCreateOrg)->format('d/m/Y') }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <h5>Informasi Tambahan : </h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead class="bg-light border-top">
                                                <tr>
                                                    <th scope="row" class="border-0 text-left">Field</th>
                                                    <th scope="row" class="border-0">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-left fw-bold h6">Sumber</th>
                                                    <td>{{ $rowDataset->sumber }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left fw-bold h6">Pengelola</th>
                                                    <td>{{ $rowDataset->pengelola }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left fw-bold h6">Lisensi</th>
                                                    <td>{{ $rowDataset->lisensi }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left fw-bold h6">Versi</th>
                                                    <td>{{ $rowDataset->versi_dataset }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left fw-bold h6">Terakhir diUpdate</th>
                                                    <td>{{ $rowDataset->updated_at }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-12 col-xl-12">
                                    <h5>File Terkait :</h5>
                                    <div class="row">
                                        @foreach ($rowFile as $item)
                                        <div class="col-lg-6">
                                            <div class="card mb-2" style="width: 18rem;">
                                                @switch($item->ekstensi_file)
                                                    @case('pdf')
                                                        <img src="/images/assets/pdfIcon.png" class="card-img-top" alt="PDF Icon">
                                                        @break
                                                    @case('docx')
                                                        <img src="/images/assets/docxIcon.png" class="card-img-top" alt="DOCX Icon">
                                                        @break
                                                    @case('xlsx')
                                                        <img src="/images/assets/xlsxIcon.png" class="card-img-top" alt="XLSX Icon">
                                                        @break
                                                    @default
                                                        <img src="/images/assets/file.png" class="card-img-top" alt="File Icon">
                                                        @break
                                                @endswitch
                                                <div class="card-body">
                                                  <a href="/storage/datasetFile/{{ $item->nama_file }}" class="card-text" id="identificationFileDataset" target="_blank">Dataset File - {{ $loop->iteration }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @switch($rowDataset->is_publish)
                    @case(1)
                        <button type="button" class="btn btn-success" disabled>Sudah diSetujui</button>
                        @break
                    @case(0)
                        <button type="button" class="btn btn-primary">Belum diSetujui</button>
                        @break
                    @default
                        <button type="button" class="btn btn-primary">Belum diSetujui</button>
                        @break
                @endswitch
            </div>
        </div>
    </div>
</div>

