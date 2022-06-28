@extends('layout.userLayout.layoutUser')

@section('content')
<div role="main">
    <div id="content" class="container">
        <div class="flash-messages">
        </div>
        <div class="toolbar">
            <ol class="breadcrumb">
                <li class="home"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i><span> Home</span></a></li>
                <li><a href="{{ route('user.organisasi') }}">Organisasi</a></li>
                <li class="active"><a class=" active" href="{{ route('user.organisasiDetail', $organisasi->id) }}">{{ $organisasi->nama_organisasi }}</a></li>
            </ol>
        </div>
        <div class="row wrapper">
            <aside class="secondary col-sm-3">
                <div class="module context-info">
                    <section class="module-content">
                        <div class="image">
                            <a href="">
                                @if ($organisasi->logo_organisasi != null)
                                    <img src="/images/organisasi/{{ $organisasi->logo_organisasi }}" width="190"
                                    height="118" alt="logo-organisasi">
                                @else
                                    <img src="/images/assets/organisasi.png" width="190"
                                    height="118" alt="logo-organisasi">
                                @endif

                            </a>
                        </div>
                        <h1 class="heading">
                            {{ $organisasi->nama_organisasi }}
                        </h1>
                        <div class="nums">
                            <dl>
                                <dt>Dataset</dt>
                                <dd><span>{{ $dataset->count() }}</span></dd>
                            </dl>
                        </div>
                        <div class="follow_button">

                        </div>
                    </section>
                </div>
                <div class="filters">
                    <div>
                        <section class="module module-narrow module-shallow">
                            <h2 class="module-heading">
                                <i class="fa fa-filter"></i>
                                Organisasi
                            </h2>
                            <nav>
                                <ul class="list-unstyled nav nav-simple nav-facet">
                                    <li class="nav-item">
                                        <a href="#">
                                            <span class="item-label">{{ $organisasi->nama_organisasi }}</span>
                                            <span class="hidden separator"> - </span>
                                            <span class="item-count badge">{{ $dataset->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <p class="module-footer">
                            </p>
                        </section>
                        <section class="module module-narrow module-shallow">
                            <h2 class="module-heading">
                                <i class="fa fa-filter"></i>
                                Sektoral
                            </h2>
                            <nav>
                                <ul class="list-unstyled nav nav-simple nav-facet">
                                    @foreach ($dataset as $ds)
                                    <li class="nav-item">
                                        <a href="#">
                                            <span class="item-label">{{ $sektoral->where('kode_sektor', $ds->kode_sektoral)->first()->nama_sektor }}</span>
                                            <span class="hidden separator"> - </span>
                                            <span class="item-count badge">{{ $sektoral->where('kode_sektor', $ds->kode_sektoral)->count() }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                            <p class="module-footer">
                            </p>
                        </section>
                        <section class="module module-narrow module-shallow">
                            <h2 class="module-heading">
                                <i class="fa fa-filter"></i>
                                Tag
                            </h2>
                            <nav>
                                <ul class="list-unstyled nav nav-simple nav-facet">
                                    @foreach ($dataset as $dt)
                                    <li class="nav-item">
                                        <a href="#">
                                            <span class="item-label">{{ $tag->where('kode_tag', $dt->kode_tag)->first()->nama_tag }}</span>
                                            <span class="hidden separator"> - </span>
                                            <span class="item-count badge">{{ $tag->where('kode_tag', $dt->kode_tag)->count() }}</span>
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
                <article class="module">
                    <header class="module-content page-header">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="pemerintahan-dan-pembangunan-manusia.html"><i
                                        class="fa fa-sitemap"></i> Dataset</a></li>
                        </ul>
                    </header>
                    <div class="module-content">
                        <h2>{{ $dataset->count() }} dataset ditemukan</h2>
                        <br>
                        <ul class="dataset-list list-unstyled">
                            @foreach ($dataset as $ds)
                            <li class="dataset-item">
                                <div class="dataset-content">
                                    <h3 class="dataset-heading">
                                        <a href="#">{{ $ds->judul_dataset }}</a>
                                    </h3>
                                    <p class="empty">This dataset has no description</p>
                                </div>
                                <ul class="dataset-resources list-unstyled">
                                    <li>
                                        <a href="#" style="cursor: context-menu" class="label label-default"
                                            data-format="xlsx">{{ $file->where('kode_dataset', $ds->kode_dataset)->count() }} file</a>
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
