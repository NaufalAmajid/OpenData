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
            <span style="cursor: pointer;" onclick="detailDataset('{{ $item->id }}', '{{ $loop->iteration }}')" id="btnLook{{ $loop->iteration }}" data-name="look"><i class="bi bi-eye text-info fs-5"></i></span>
            <span style="cursor: pointer;" class="d-none" id="btnUnlook{{ $loop->iteration }}" data-name="Unlook"><i class="bi bi-eye-slash text-info fs-5"></i></span>
        </td>
    </tr>
@endforeach
