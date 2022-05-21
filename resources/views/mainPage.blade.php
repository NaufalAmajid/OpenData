@extends('layout.userLayout.layoutUser')

@section('content')

    <div class="homepage layout-1">
        <div class="container">

            <div class="flash-messages">



            </div>

        </div>

        <div role="main" class="hero">
        </div>
        <div role="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col2">



                        <div class="module-content box">
                            <header>
                                <h1 class="page-heading">Open Data Kabupaten Klaten</h1>
                            </header>


                            <section class="featured media-overlay hidden-xs">

                                <a class="media-image" href="#">
                                    <img class="img-responsive" src="{{ asset('template/forUser/base/images/placeholder-420x220.png') }}"
                                        alt="Placeholder" width="420" height="220">
                                </a>

                            </section>
                        </div>
                    </div>
                    <div class="col-md-6 col1">
                        <div class="box stats">
                            <div class="inner">
                                <h3>Open Data Kabupaten Bogor Statistik</h3>
                                <ul>

                                    <li>
                                        <a href="dataset.html">
                                            <strong><span>546</span></strong>
                                            Dataset
                                        </a>
                                    </li>
                                    <li>
                                        <a href="organization.html">
                                            <strong><span>76</span></strong>
                                            Organisasi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="group.html">
                                            <strong><span>3</span></strong>
                                            Sektoral
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="module module-search module-narrow module-shallow box">
                            <form class="module-content search-form" method="get" action="/dataset">
                                <h3 class="heading">Cari Dataset ..</h3>
                                <div class="search-input form-group search-giant">
                                    <input aria-label="Search datasets" id="field-main-search" type="text"
                                        class="form-control" name="q" value="" autocomplete="off"
                                        placeholder="E.g. ekonomi, infrastruktur, dll ..">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </form>
                            <div class="tags">
                                <h3>Populer tag</h3>

                                <a class="tag" href="dataset-1.html?tags=infrastruktur">infrastruktur</a>

                                <a class="tag" href="dataset-2.html?tags=Aset+Desa">Aset Desa</a>

                                <a class="tag" href="dataset-2.html?tags=aset+desa">aset desa</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div role="main">
            <div class="container">
                <div class="row">
                    <div class="span12 col1">
                        <a class="image">
                            <img src="{{ asset('template/forUser/base/images/pancakarsa-kab-bogor.jpg') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
