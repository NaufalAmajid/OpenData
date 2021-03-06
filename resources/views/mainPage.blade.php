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
                                <img class="img-responsive" src="{{ asset('template/forUser/assets/petaklaten.png') }}"
                                    alt="Placeholder" width="420" height="220">
                            </a>

                        </section>
                    </div>
                </div>
                <div class="col-md-6 col1">
                    <div class="box stats">
                        <div class="inner">
                            <h3>Open Data Kabupaten Klaten</h3>
                            <ul>

                                <li>
                                    <a href="{{ route('user.dataset') }}">
                                        <strong><span>{{ $countDataset }}</span></strong>
                                        Dataset
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.organisasi') }}">
                                        <strong><span>{{ $countOrganisasi }}</span></strong>
                                        Organisasi
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.sektoral') }}">
                                        <strong><span>{{ $countSektoral }}</span></strong>
                                        Sektoral
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    {{-- <div class="module module-search module-narrow module-shallow box">
                        <div class="tags">
                            <h3>Populer tag</h3>
                            <a class="tag" href="dataset-1.html?tags=infrastruktur">infrastruktur</a>
                            <a class="tag" href="dataset-2.html?tags=Aset+Desa">Aset Desa</a>
                            <a class="tag" href="dataset-2.html?tags=aset+desa">aset desa</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div role="main">
        <div class="container">
            <div class="row">
                <div class="span12 col1">
                    <a class="image">
                        <img src="{{ asset('template/forUser/assets/bupatiwakil.png') }}" id="fotoBuWa">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
