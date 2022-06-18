<div class="d-flex justify-content-between w-100 flex-wrap mb-3">
    <div class="mb-3 mb-lg-0">
        <h1 class="h4">Detail Dataset</h1>
        <p class="mb-0">Berikut adalah detail Dataset <span class="fw-bold"></span> , jika anda adalah creator dataset ini anda dapat mengelolanya kembali.</p>
    </div>
</div>
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
                {{-- Edit Judul Dataset --}}
                <h2 class="h4 mb-0">
                    @if ($rowDataset->pembuat == Auth::user()->kode_admin)
                        <input type="text" name="editJudulDataset" id="editJudulDataset" class="form-control-plaintext" value="{{ $rowDataset->judul_dataset }}">
                    @else
                        {{ $rowDataset->judul_dataset }}
                    @endif
                </h2>
                {{-- End Edit Judul Dataset --}}
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
                            {{-- Edit Sektoral Dataset --}}
                            <li class="list-group-item fw-normal">
                                @if ($rowDataset->pembuat == Auth::user()->kode_admin)
                                    Sektoral :
                                    <span class="col-lg-6">
                                        <select name="editSektoralDataset" id="editSektoralDataset" class="form-select">
                                            <option value="{{ $rowDataset->kode_sektoral }}" selected>{{ $rowDataset->nama_sektor }}</option>
                                            @foreach($rowSektoral as $row)
                                                @if ($row->kode_sektor != $rowDataset->kode_sektoral)
                                                    <option value="{{ $row->kode_sektor }}">{{ $row->nama_sektor }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </span>
                                @else
                                    Sektoral : {{ $rowDataset->nama_sektor }}
                                @endif
                            </li>
                            {{-- End Edit Sektoral Dataset --}}
                            {{-- Edit Tag Dataset --}}
                            <li class="list-group-item fw-normal">
                                @if ($rowDataset->pembuat == Auth::user()->kode_admin)
                                    Tag :
                                    <span class="col-lg-6">
                                        <select name="editTagDataset" id="editTagDataset" class="form-select">
                                            <option value="{{ $rowDataset->kode_tag }}" selected>{{ $rowDataset->nama_tag }}</option>
                                            @foreach($rowTag as $tag)
                                                @if ($tag->kode_tag != $rowDataset->kode_tag)
                                                    <option value="{{ $tag->kode_tag }}">{{ $tag->nama_tag }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </span>
                                @else
                                    Tag : {{ $rowDataset->nama_tag }}
                                @endif
                            </li>
                            {{-- End Edit Tag Dataset --}}
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
                                    <td><input type="text" class="form-control-plaintext" name="editSumberDataset" id="editSumberDataset" value="{{ $rowDataset->sumber }}" @if($rowDataset->pembuat != Auth::user()->kode_admin) readonly @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-left fw-bold h6">Pengelola</th>
                                    <td><input type="text" class="form-control-plaintext" name="editPengelolaDataset" id="editPengelolaDataset" value="{{ $rowDataset->pengelola }}" @if($rowDataset->pembuat != Auth::user()->kode_admin) readonly @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-left fw-bold h6">Lisensi</th>
                                    <td><input type="text" class="form-control-plaintext" name="editLisensiDataset" id="editLisensiDataset" value="{{ $rowDataset->lisensi }}" @if($rowDataset->pembuat != Auth::user()->kode_admin) readonly @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-left fw-bold h6">Versi</th>
                                    <td><input type="text" class="form-control-plaintext" name="editVersiDataset" id="editVersiDataset" value="{{ $rowDataset->versi_dataset }}" @if($rowDataset->pembuat != Auth::user()->kode_admin) readonly @endif></td>
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
                                        <img src="/images/assets/fileIcon.png" class="card-img-top" alt="File Icon">
                                        @break
                                @endswitch
                                <div class="card-body">
                                  <p class="card-text" id="identificationFileDataset" onclick="previewFile('{{ $item->id }}')">Dataset File - {{ $loop->iteration }}</p>
                                  <div class="row mb-2">
                                    <label for="editFileDataset" class="form-label" style="font-size: 12px;">Edit diSini :</label>
                                    <input type="file" id="editFileDataset" name="editFileDataset" class="form-control col-lg-3">
                                  </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-6">
                            <div class="card mb-2" style="width: 18rem;">
                                <img src="/images/assets/fileCreateIcon.png" class="card-img-top" alt="File Icon">
                                <div class="card-body">
                                  <p class="card-text">Tambah File :</p>
                                  <div class="row mb-2">
                                    <input type="file" name="addFileDataset" class="form-control col-lg-3">
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
