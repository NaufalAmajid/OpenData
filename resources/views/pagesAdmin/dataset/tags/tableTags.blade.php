<table class="table table-flush alignt-item-center" id="tableTags">
    <thead>
        <tr>
            <th class="border-bottom" scope="col">Tags</th>
            <th class="border-bottom" scope="col">Creator</th>
            <th class="border-bottom" scope="col">Status</th>
            <th class="border-bottom" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $item)
        <tr>
            <td><input type="text" class="form-control-plaintext" id="namaTagUpdate-{{ $item->id }}" value="{{ $item->nama_tag }}" @if ($item->pembuat != Auth::user()->name) readonly @endif></td>
            <td>{{ $item->pembuat }}</td>
            <td>
                @switch($item->is_correct)
                    @case(0)
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @break
                    @case(1)
                        <span class="badge bg-success">Aktif</span>
                    @break
                    @default
                        <span class="badge bg-warning">Tidak Diketahui</span>
                    @break
                @endswitch
            </td>
            <td>
                <span style="cursor: pointer;" onclick="@if($item->pembuat == Auth::user()->name) showDataToEditTag('{{ $item->id }}') @else alertNotUpdate() @endif"><i class="bi bi-pencil-square text-info fs-5"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
