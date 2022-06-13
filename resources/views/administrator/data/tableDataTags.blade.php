<table class="table table-flush alignt-item-center" id="tableDataTags">
    <thead>
        <tr>
            <th class="border-bottom" scope="col">Tag</th>
            <th class="border-bottom" scope="col">Creator</th>
            <th class="border-bottom" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataTag as $item)
        <tr>
            <td>{{ $item->nama_tag }}</td>
            <td>{{ $item->pembuat }}</td>
            <td>
                @switch($item->is_correct)
                    @case(0)
                        <span class="p-2" style="cursor: pointer;" onclick="updateTagAccept('{{ $item->id }}')" data-bs-toggle="tooltip" title="Setujui Tag"><i class="bi bi-clipboard-minus-fill text-warning fs-5"></i></span>
                        @break
                    @case(1)
                        <span class="p-2"><i class="bi bi-clipboard-check-fill text-success fs-5"></i></span>
                        @break
                    @default
                        <span class="p-2" style="cursor: pointer;"><i class="bi bi-clipboard-check-fill text-success fs-5"></i></span>
                        @break
                @endswitch
                <span class="p-2" style="cursor: pointer;" data-bs-toggle="tooltip" title="Hapus Tag" onclick="deleteTag('{{ $item->id }}', '{{ $item->kode_tag }}')"><i class="bi bi-trash text-danger fs-5"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

