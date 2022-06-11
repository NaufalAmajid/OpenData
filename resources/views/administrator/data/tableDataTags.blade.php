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
        <tr class="rowDataTags-{{ $loop->iteration }}">
            <td>{{ $item->nama_tag }}</td>
            <td>{{ $item->pembuat }}</td>
            <td>
                @switch($item->is_correct)
                    @case(0)
                        <span class="p-2" style="cursor: pointer;" onclick="updateTagAccept('{{ $item->id }}', '{{ $loop->iteration }}')"><i class="bi bi-clipboard-minus-fill text-warning fs-5"></i></span>
                        @break
                    @case(1)
                        <span class="p-2"><i class="bi bi-clipboard-check-fill text-success fs-5"></i></span>
                        @break
                    @default
                        <span class="p-2" style="cursor: pointer;"><i class="bi bi-clipboard-check-fill text-success fs-5"></i></span>
                        @break
                @endswitch
                <span class="p-2" style="cursor: pointer;"><i class="bi bi-trash text-danger fs-5"></i></span>
            </td>
        </tr>
        <tr class="loaderAcceptTags-{{ $loop->iteration }} d-none">
            <td class="d-none"></td>
            <td colspan="3">
                <div class="d-flex justify-content-center">
                    <img src="/images/assets/loader.gif" alt="loader">
                </div>
            </td>
            <td class="d-none"></td>
        </tr>
        @endforeach
    </tbody>
</table>

