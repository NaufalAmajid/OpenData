@extends('layout.userLayout.layoutUser')

@section('content')
<div role="main">
    <div id="content" class="container">
        <div class="flash-messages">
        </div>
        <div class="toolbar">
            <ol class="breadcrumb">
                <li class="home"><a href="javascript:PageHome()"><i class="fa fa-home"></i><span> Home</span></a></li>
                <li class="active"><a href="javascript:PageDataset()">Datasets</a></li>
            </ol>
        </div>
        <div class="row wrapper">
            <aside class="secondary col-sm-3">
                <div class="filters">
                    <div>
                        <section class="module module-narrow module-shallow">
                            <h2 class="module-heading">
                                <i class="fa fa-filter"></i>
                                Organisasi
                            </h2>
                            <nav>
                                <ul class="list-unstyled nav nav-simple nav-facet">
                                    @foreach ($organisasi as $org)
                                    <li class="nav-item">
                                        <a href="dataset-3.html?organization=dinas-kesehatan" title="">
                                            <span class="item-label">{{ $org->nama_organisasi }}</span>
                                            <span class="hidden separator"> - </span>
                                            <span class="item-count badge">{{ $dataset->where('kode_organisasi', $org->kode_organisasi)->count() }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                            <p class="module-footer">
                                <a href="dataset-13.html?_organization_limit=0" class="read-more">Show More
                                    Organisasi</a>

                            </p>
                        </section>
                        <section class="module module-narrow module-shallow">
                            <h2 class="module-heading">
                                <i class="fa fa-filter"></i>
                                Sektoral
                            </h2>
                            <nav>
                                <ul class="list-unstyled nav nav-simple nav-facet">
                                    @foreach ($sektoral as $sek)
                                    <li class="nav-item">
                                        <a href="dataset-14.html?groups=pemerintahan-dan-pembangunan-manusia"
                                            title="Pemerintahan dan Pembangunan Manusia">
                                            <span class="item-label">{{ $sek->nama_sektor }}</span>
                                            <span class="hidden separator"> - </span>
                                            <span class="item-count badge">{{ $dataset->where('kode_sektoral', $sek->kode_sektor)->count() }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </section>
                        <section class="module module-narrow module-shallow">
                            <h2 class="module-heading">
                                <i class="fa fa-filter"></i>
                                Tag
                            </h2>
                            <nav>
                                <ul class="list-unstyled nav nav-simple nav-facet">
                                    @foreach ($tag as $tag)
                                    <li class="nav-item">
                                        <a href="dataset-1.html?tags=infrastruktur" title="">
                                            <span class="item-label">{{ $tag->nama_tag }}</span>
                                            <span class="hidden separator"> - </span>
                                            <span class="item-count badge">{{ $dataset->where('kode_tag', $tag->kode_tag)->count() }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                            <p class="module-footer">

                            </p>
                        </section>
                    </div>
                    <a class="close no-text hide-filters"><i class="fa fa-times-circle"></i><span
                            class="text">close</span></a>
                </div>
            </aside>
            <div class="primary col-sm-9 col-xs-12">
                <section class="module">
                    <div class="module-content">
                        <form id="dataset-search-form" class="search-form" method="get" data-module="select-switch">
                            <div class="input-group search-input-group">
                                <input aria-label="Cari datasets..." id="field-giant-search" type="text"
                                    class="form-control input-lg" name="q" value="" autocomplete="off"
                                    placeholder="Cari datasets...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="submit" value="search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-select form-group control-order-by">
                                <label for="field-order-by">Urut berdasarkan</label>
                                <select id="field-order-by" name="sort" class="form-control">
                                    <option value="score desc, metadata_modified desc" selected="selected">Relevansi
                                    </option>
                                    <option value="title_string asc">Nama Urutkan Naik</option>
                                    <option value="title_string desc">Nama Urutkan Turun</option>
                                    <option value="metadata_modified desc">Terakhir Dimodifikasi</option>
                                </select>
                                <button class="btn btn-default js-hide" type="submit">Go</button>
                            </div>
                            <h2>
                                {{ $dataset->count() }} dataset ditemukan</h2>
                            <p class="filter-list">
                            </p>
                            <a class="show-filters btn btn-default">Filter Results</a>
                        </form>
                        <ul class="dataset-list list-unstyled">
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
                        </ul>
                    </div>
                    <div class='pagination-wrapper'>
                        <ul class='pagination'>
                            <li><a href="dataset-24.html?page=1">«</a></li>
                            <li class="active"><a href="dataset-24.html?page=1">1</a></li>
                            <li><a href="dataset-25.html?page=2">2</a></li>
                            <li><a href="dataset-26.html?page=3">3</a></li>
                            <li><a href="dataset-213.html?page=4">4</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="dataset-27.html?page=28">28</a></li>
                            <li><a href="dataset-26.html?page=3">»</a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
