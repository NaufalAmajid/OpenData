@foreach ($dataset as $item)
<li class="dataset-item">
    <div class="dataset-content">
        <h3 class="dataset-heading">
            <a href="dataset/data-umum-2-kecamatan-nanggung.html">{{ $item->judul_dataset }}</a>
        </h3>
        <p class="empty">This dataset has no description</p>
    </div>
    <ul class="dataset-resources list-unstyled">
        <li>
            <a href="dataset/data-umum-2-kecamatan-nanggung.html"
                class="label label-default" data-format="xlsx">XLSX</a>
        </li>
    </ul>
</li>
@endforeach
