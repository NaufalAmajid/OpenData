<div class="modal fade" id="modalDetailAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="javascript:void(0)" method="POST" id="formEditAdmin">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail dan Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="idAdmin" value="{{ $dataAdmin->id }}">
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap Admin" name="editNamaLengkap"
                                        id="editNamaLengkap" autocomplete="off" value="{{ $dataAdmin->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Organisasi</label>
                                    <select class="form-select" id="editOrganisasiAdmin" name="editOrganisasiAdmin">
                                        <option value="{{ $dataAdmin->kode_organisasi }}" selected>{{ $organisasiAdmin->nama_organisasi }}</option>
                                        @foreach ($organisasi as $item)
                                            @if ($dataAdmin->kode_organisasi != $item->kode_organisasi)
                                                <option value="{{ $item->kode_organisasi }}">{{ $item->nama_organisasi }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Username Admin" name="editUsername"
                                        id="editUsername" autocomplete="off" value="{{ $dataAdmin->username }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="editPassword"
                                        id="editPassword" autocomplete="off" value="password" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="editIsAdmin" name="editIsAdmin" value="{{ $dataAdmin->is_admin }}" @if ($dataAdmin->is_admin == 1) checked @endif>
                                    <label class="form-check-label" for="editIsAdmin">Apakah dia Seorang<span style="font-weight: bold;"> Administrator?</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <hr>
                        </div>
                        <div class="row mt-3">
                            <h3>Informasi Kontribusi Admin</h3>
                        </div>
                        <div class="row mt-2">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Dataset</th>
                                        <th>:</th>
                                        <th>{{ $countDatasetUserCreate }}</th>
                                    </tr>
                                    <tr>
                                        <th>Sektoral</th>
                                        <th>:</th>
                                        <th>{{ $countSektoralUserCreate }}</th>
                                    </tr>
                                    <tr>
                                        <th>Tag</th>
                                        <th>:</th>
                                        <th>{{ $countTagUserCreate }}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
