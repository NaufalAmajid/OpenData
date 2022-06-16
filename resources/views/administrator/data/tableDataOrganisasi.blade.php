<table class="table table-hover table-borderless alignt-item-center" id="tableOrganisasiAdministrator">
    <thead>
        <tr>
            <th scope="col">Organisasi</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataOrganisasi as $item)
        <tr onclick="detailOrganisasi('{{ $item->id }}')" style="cursor: pointer;">
            <td>{{ Str::substr($item->nama_organisasi, 0, 20) . '...' }}</td>
            <td><span class="badge bg-success">{{ $item->is_correct == 2 ? 'Published' : 'Unpublished' }}</span></td>
        </tr>
        @endforeach
    </tbody>
</table>
