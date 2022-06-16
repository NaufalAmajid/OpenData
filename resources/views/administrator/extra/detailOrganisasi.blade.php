<!-- Modal -->
<div class="modal fade" id="modalDetailOrganisasi" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="javascript:void(0)" id="formEditDataOrganisasi" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail dan Edit Organisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row mb-4">
                                <div class="d-flex justify-content-center">
                                    @if ($dataOrganisasi->logo_organisasi != '')
                                        <img src="{{ asset('images/organisasi/' . $dataOrganisasi->logo_organisasi) }}" id="editShowLogoOrganisasi" class="shadow" alt="Icon Organisasi" style="width: 200px; height: 200px;">
                                    @else
                                        <img src="{{ asset('images/assets/organisasi.png') }}" id="editShowLogoOrganisasi" class="shadow" alt="Icon Organisasi" style="width: 200px; height: 200px;">
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <div class="col-lg-4">
                                        <input type="hidden" name="idOrganisasi" value="{{ $dataOrganisasi->id }}">
                                        <input type="hidden" name="nameLogoOrganisasiOld" id="nameLogoOrganisasiOld" value="{{ $dataOrganisasi->logo_organisasi }}">
                                        <input type="file" class="form-control" name="editLogoOrganisasi" id="editLogoOrganisasi">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <table>
                                        <tr>
                                            <td class="text-end">Nama Organisasi</td>
                                            <td class="p-3">:</td>
                                            <td><input type="text" class="form-control-plaintext" name="namaOrganisasiEdit" id="namaOrganisasiEdit" value="{{ $dataOrganisasi->nama_organisasi }}"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end">Deskripsi</td>
                                            <td class="p-3">:</td>
                                            <td><textarea class="form-control-plaintext" name="deskripsiOrganisasiEdit" id="deskripsiOrganisasiEdit" cols="30" style="overflow-y: hidden;" >{{ $dataOrganisasi->deskripsi }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end">Tgl Buat</td>
                                            <td class="p-3">:</td>
                                            <td>{{ \Carbon\Carbon::parse($dataOrganisasi->created_at)->format('d, M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="alert alert-info d-flex align-items-center" role="alert">
                                                    <i class="bi bi-card-checklist fs-5 p-2"></i>
                                                    <div class="fs-5">
                                                        Jumlah Dataset dengan Organisasi ini ada <strong>{{ $countDataset }}</strong>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                                    <i class="bi bi-card-checklist fs-5 p-2"></i>
                                                    <div class="fs-5">
                                                        Jumlah User dengan Organisasi ini ada <strong>{{ $countUser }}</strong>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="deleteOrganisasi('{{ $dataOrganisasi->kode_organisasi }}')">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
