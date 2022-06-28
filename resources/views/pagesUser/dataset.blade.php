@extends('layout.userLayout.layoutUser')

@section('content')
<div role="main">
    <div id="content" class="container">
        <div class="flash-messages">
        </div>
        <div class="toolbar">
            <ol class="breadcrumb">
                <li class="home"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i><span> Home</span></a></li>
                <li class="active"><a href="{{ route('user.dataset') }}">Datasets</a></li>
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
                                <input aria-label="Cari datasets..." id="searchDataset" type="text"
                                    class="form-control input-lg" name="searchDataset" autocomplete="off"
                                    placeholder="Cari datasets...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="submit" value="search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <h2 id="textDatasetFind"></h2>
                        </form>
                        <ul class="dataset-list list-unstyled">
                            <div class="listDataset"></div>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            listDataset();
            $('#searchDataset').keyup(function () {
                listDataset();
            });
        });

        function listDataset(){

            var search = $('#searchDataset').val();
            var value = search.replace(/\b\w/g, function(l) {
                return l.toUpperCase();
            }).replace(/\s+/g, function(l) {
                return l.toUpperCase();
            });

            $.ajax({
                url: "{{ route('user.datasetList') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    search: search
                },
                success: function(data){
                    $('.listDataset').html(data.view);
                    $('#textDatasetFind').html(data.dataset.length + ' dataset ditemukan');
                }
            });
        }
    </script>

@endsection
