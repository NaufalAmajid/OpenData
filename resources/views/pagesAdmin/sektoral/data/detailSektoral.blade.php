<!-- Modal -->
<div class="modal fade" id="modalDetailSektoral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail dan Edit Sektoral</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="row mb-4">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('images/sektoral/' . $sektoral->logo_sektor) }}" id="editShowLogoSektoral" class="shadow" alt="Icon sektoral" style="width: 200px; height: 200px;">
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <div class="col-lg-4">
                                    <input type="file" class="form-control" name="editlogoSektoral" id="editLogoSektoral" @if ($sektoral->pembuat != Auth::user()->name) disabled @endif>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <table>
                                    <tr>
                                        <td class="text-end">Nama Sektoral</td>
                                        <td class="p-3">:</td>
                                        <td><input type="text" class="form-control-plaintext" name="namaSektoral" value="{{ $sektoral->nama_sektor }}" @if ($sektoral->pembuat != Auth::user()->name) readonly @endif></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end">Deskripsi</td>
                                        <td class="p-3">:</td>
                                        <td><textarea class="form-control-plaintext" name="deskripsi" cols="30" style="overflow-y: hidden;" @if ($sektoral->pembuat != Auth::user()->name) readonly @endif>{{ $sektoral->deskripsi }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end">Tgl Buat</td>
                                        <td class="p-3">:</td>
                                        <td>{{ \Carbon\Carbon::parse($sektoral->created_at)->format('d, M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end">Pembuat</td>
                                        <td class="p-3">:</td>
                                        <td>{{ $sektoral->pembuat }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="alert alert-info d-flex align-items-center" role="alert">
                                                <i class="bi bi-card-checklist fs-5 p-2"></i>
                                                <div class="fs-5">
                                                    Jumlah Dataset dengan Sektoral ini ada <strong>{{ $countDataset }}</strong>
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
                <button type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
