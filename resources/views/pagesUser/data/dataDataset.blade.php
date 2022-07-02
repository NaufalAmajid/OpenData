@foreach ($dataset as $item)
<li class="dataset-item">
    <div class="dataset-content">
        <h3 class="dataset-heading">
            <a href="{{ route('user.datasetDetail', $item->kode_dataset) }}">{{ $item->judul_dataset }}</a>
        </h3>
        <p class="empty">This dataset has no description</p>
    </div>
    <ul class="dataset-resources list-unstyled">
        @php
            $resources = $file->where('kode_dataset', $item->kode_dataset)->count();
        @endphp
        <li>
            <a href="{{ route('user.datasetDetail', $item->kode_dataset) }}"
                class="label label-default" data-format="xlsx">{{ $resources }} Files</a>
        </li>
    </ul>
</li>
@endforeach
