<table class="table table-hover table-striped table-bordered" id="tableDataset" width="100%"
    cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Dataset</th>
            <th>Pembuat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rowDataset as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul_dataset }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    @switch($item->is_publish)
                        @case(0)
                            <span class="badge bg-danger">Unpublished</span>
                            @break
                        @case(1)
                            <span class="badge bg-success">Published</span>
                            @break
                        @default
                            <span class="badge bg-warning">Unknown</span>
                            @break
                    @endswitch
                </td>
                <td>
                    <span style="cursor: pointer;" class="p-2" onclick="detailDataset('{{ $item->id }}')" id="btnLook{{ $loop->iteration }}" data-name="look"><i class="bi bi-eye text-info fs-5"></i></span>
                    @if ($item->pembuat == Auth::user()->kode_admin)
                        <span style="cursor: pointer;" class="p-2" onclick="deleteDataset('{{ $item->id }}')" id="btnDeleteDataset{{ $loop->iteration }}" data-name="delete"><i class="bi bi-trash text-danger fs-5"></i></span>
                    @endif
                    <span style="cursor: pointer;" class="d-none" id="btnUnlook{{ $loop->iteration }}" data-name="Unlook"><i class="bi bi-eye-slash text-info fs-5"></i></span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
