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
