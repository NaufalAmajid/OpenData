<!-- Modal -->
<div class="modal fade" id="modalDetailSektoral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="javascript:void(0)" id="formEditDataSektoral" enctype="multipart/form-data" method="POST">
            @csrf
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
                                    @if ($sektoral->logo_sektoral != '')
                                        <img src="{{ asset('images/sektoral/' . $sektoral->logo_sektor) }}" id="editShowLogoSektoral" class="shadow" alt="Icon sektoral" style="width: 200px; height: 200px;">
                                    @else
                                        <img src="{{ asset('images/assets/sektoral.png') }}" id="editShowLogoSektoral" class="shadow" alt="Icon sektoral" style="width: 200px; height: 200px;">
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <div class="col-lg-4">
                                        <input type="hidden" name="idSektoral" value="{{ $sektoral->id }}">
                                        <input type="hidden" name="nameLogoSektoralOld" id="nameLogoSektoralOld" value="{{ $sektoral->logo_sektor }}">
                                        <input type="file" class="form-control" name="editlogoSektoral" id="editLogoSektoral" @if ($sektoral->pembuat != Auth::user()->kode_admin) disabled @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <table>
                                        <tr>
                                            <td class="text-end">Nama Sektoral</td>
                                            <td class="p-3">:</td>
                                            <td><input type="text" class="form-control-plaintext" name="namaSektoral" id="namaSektoralEdit" value="{{ $sektoral->nama_sektor }}" @if ($sektoral->pembuat != Auth::user()->kode_admin) readonly @endif></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end">Deskripsi</td>
                                            <td class="p-3">:</td>
                                            <td><textarea class="form-control-plaintext" name="deskripsi" id="deskripsiSektoralEdit" cols="30" style="overflow-y: hidden;" @if ($sektoral->pembuat != Auth::user()->kode_admin) readonly @endif>{{ $sektoral->deskripsi }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end">Tgl Buat</td>
                                            <td class="p-3">:</td>
                                            <td>{{ \Carbon\Carbon::parse($sektoral->created_at)->format('d, M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-end">Pembuat</td>
                                            <td class="p-3">:</td>
                                            <td>{{ $getAdmin->name }}</td>
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
                    <button @if($sektoral->pembuat != Auth::user()->kode_admin) type="button" @else type="submit" @endif class="btn btn-primary" @if($sektoral->pembuat != Auth::user()->kode_admin) onclick="notAlloweUpdateSektoral()" @endif>Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
