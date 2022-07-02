<h1>
    {{ $dataset->judul_dataset }}
</h1>
<span class="insert-comment-thread"></span>
<section id="dataset-resources" class="resources">
    <h3>Data dan Resources</h3>
    <ul class="resource-list">
        @foreach ($fileDataset as $item)
        <li class="resource-item">
            <a class="heading"
                href="{{ route('user.datasetDetailFile', $item->id) }}">File {{ $loop->iteration }} - {{ str_replace(' ', '-', strtolower($dataset->judul_dataset)) }}
                <span class="format-label"
                    property="dc:format" data-format="{{ strtolower($item->ekstensi_file) }}">{{ strtoupper($item->ekstensi_file) }}</span>
            </a>
            <p class="description">
                {{ str_replace(' ', '-', strtolower($dataset->judul_dataset)) }}
            </p>
            <div class="dropdown btn-group">
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-share"></i>
                    Explore
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('user.datasetDetailFile', $item->id) }}">
                            <i class="fa fa-bar-chart-o"></i>
                            Preview
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('storage/datasetFile/' . $item->nama_file) }}"
                            class="resource-url-analytics" target="_blank" download>
                            <i class="fa fa-arrow-circle-o-down"></i>
                            Download
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endforeach
    </ul>
</section>
<section class="tags">
    <ul class="tag-list well">
        <li>
            <a class="tag" href="#">{{ $dataset->nama_tag }}</a>
        </li>
    </ul>
</section>
<section class="additional-info">
    <h3>Informasi Tambahan</h3>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th scope="col">Field</th>
                <th scope="col">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="dataset-label">Sumber</th>

                <td class="dataset-details" property="foaf:homepage">{{ $dataset->sumber ?? $dataset->nama_organisasi }}</td>

            </tr>
            <tr>
                <th scope="row" class="dataset-label">Pembuat</th>
                <td class="dataset-details" property="dc:creator">{{ $dataset->namaAdmin }} </td>
            </tr>
            <tr>
                <th scope="row" class="dataset-label">Pengelola</th>
                <td class="dataset-details" property="dc:contributor"><a
                        href="#">{{ $dataset->pengelola ?? $dataset->nama_sektor }}</a></td>
            </tr>
            <tr>
                <th scope="row" class="dataset-label">Versi</th>
                <td class="dataset-details">{{ $dataset->versi_dataset }}</td>
            </tr>
            <tr>
                <th scope="row" class="dataset-label">Terakhir diupdate</th>
                <td class="dataset-details">

                    <span
                        data-datetime="{{ $dataset->updated_at }}">
                        {{ $dataset->updated_at->format('M d, Y H:i:s') }}
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row" class="dataset-label">Dibuat</th>
                <td class="dataset-details">
                    <span
                        data-datetime="{{ $dataset->created_at }}">
                        {{ $dataset->created_at->format('M d, Y H:i:s') }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</section>
