<table class="table table-flush table-hover alignt-item-center" id="tableDataSektoral">
    <thead>
        <tr>
            <th class="border-bottom" scope="col">Sektoral</th>
            <th class="border-bottom" scope="col">Creator</th>
            <th class="border-bottom" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataSektoral as $item)
            <tr style="cursor: pointer; z-index: 1;">
                <td>{{ $item->nama_sektor }}</td>
                <td>{{ $item->name }}</td>
                <td style="z-index: 2;">
                    @switch($item->is_correct)
                        @case(0)
                            <span class="p-2" style="cursor: pointer;" onclick="acceptSektoral('{{ $item->id }}')"><i class="bi bi-dash-circle-fill text-primary fs-5"></i></span>
                            @break
                        @case(1)
                            <span class="p-2"><i class="bi bi-check-circle-fill text-success fs-5"></i></span>
                            @break
                        @default
                            <span class="p-2"><i class="bi bi-exclamation-triangle text-danger fs-5"></i></span>
                            @break
                    @endswitch

                    <span class="p-2" style="cursor: pointer;" onclick="deleteSektoral('{{ $item->id }}', '{{ $item->kode_sektor }}')"><i class="bi bi-trash text-danger fs-5"></i></span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
