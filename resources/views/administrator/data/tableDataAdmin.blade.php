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
            <span><i class="bi bi-pencil-square text-info fs-5"></i></span>
            <span><i class="bi bi-trash text-danger fs-5"></i></span>
        </td>
    </tr>
@endforeach
