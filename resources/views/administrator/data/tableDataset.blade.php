<table class="table table-flush table-striped alignt-item-center" id="tableDataset">
    <thead>
        <tr>
            <th class="border-bottom" scope="col">Judul</th>
            <th class="border-bottom" scope="col">Creator</th>
            <th class="border-bottom" scope="col">Tgl Buat</th>
            <th class="border-bottom" scope="col">Status</th>
            <th class="border-bottom" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataDataset as $item)
        <tr>
            <td>{{ $item->judul_dataset }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                @switch($item->is_publish)
                    @case(0)
                        <div class="" id="statusPublished-{{ $loop->iteration }}">
                            <span class="badge bg-danger mb-2 mt-2">Unpublished</span>
                            <p style="font-size: 12px; cursor: pointer;" onclick="updateToPublished('{{ $item->id }}', '{{ $loop->iteration }}')"><span><i class="bi bi-dash-square-fill text-primary"></i> Belum diSetujui</span></p>
                        </div>
                        <div class="spinner-border text-success d-none" role="status" id="loaderPublished-{{ $loop->iteration }}">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        @break
                    @case(1)
                        <span class="badge bg-success">Published</span>
                        <p style="font-size: 12px;"><span><i class="bi bi-check-square-fill text-success"></i> Sudah diSetujui</span></p>
                        @break
                    @default
                        <span class="badge bg-warning">Unknown</span>
                        @break
                @endswitch
            </td>
            <td>
                <span class="p-2" style="cursor: pointer;" onclick="detailDataset('{{ $item->id }}')"><i class="bi bi-eye text-info fs-5"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
