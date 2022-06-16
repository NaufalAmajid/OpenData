<table class="table table-flush alignt-item-center" id="tableDataAdmin">
    <thead>
        <tr>
            <th class="border-bottom" scope="col">Nama</th>
            <th class="border-bottom" scope="col">Status</th>
            <th class="border-bottom" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataAdmin as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>
                @switch($item->is_active)
                    @case(0)
                        <span class="badge bg-primary">Offline</span>
                        <span style="font-size: 12px;">{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</span>
                        @break
                    @case(1)
                        <span class="badge bg-success">Online</span>
                        @break
                    @default
                        <span class="badge bg-danger">Unknown</span>
                        @break
                @endswitch
            </td>
            <td>
                <span style="cursor: pointer;" onclick="detailAdmin('{{ $item->id }}')"><i class="bi bi-bookmark-star-fill text-info fs-5"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
