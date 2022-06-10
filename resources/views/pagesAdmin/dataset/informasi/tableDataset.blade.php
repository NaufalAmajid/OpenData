@foreach ($rowDataset as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul_dataset }}</td>
        <td>{{ $item->pembuat }}</td>
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
            <span><i class="bi bi-pencil-square text-info fs-5"></i></span>
            <span><i class="bi bi-trash text-danger fs-5"></i></span>
        </td>
    </tr>
@endforeach
