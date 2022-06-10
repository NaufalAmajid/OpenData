<table class="table table-flush alignt-item-center" id="tableOrganisasiAdministrator">
    <thead>
        <tr>
            <th class="border-bottom" scope="col">Organisasi</th>
            <th class="border-bottom" scope="col">Status</th>
            <th class="border-bottom" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataOrganisasi as $item)
        <tr>
            <td>{{ $item->nama_organisasi }}</td>
            <td><span class="badge bg-success">{{ $item->is_correct == 2 ? 'Published' : 'Unpublished' }}</span></td>
            <td>
                <span><i class="bi bi-pencil-square text-info fs-5"></i></span>
                <span><i class="bi bi-trash text-danger fs-5"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
