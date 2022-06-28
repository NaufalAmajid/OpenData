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
                <li><a href="{{ route('user.organisasiDetail', $dataset->kode_organisasi) }}">{{ substr($dataset->nama_organisasi, 0, 15) . '...' }}</a></li>

                <li class="active"><a class=" active" href="status-perkembangan-desa-pasirgaok.html">{{ $dataset->judul_dataset }}</a></li>
            </ol>
        </div>
        <div class="row wrapper">
            <aside class="secondary col-sm-3">
                <section class="module module-narrow">
                    <div class="module context-info">
                        <div class="module-content">
                            <h1 class="heading">{{ $dataset->judul_dataset }}</h1>
                        </div>
                    </div>
                </section>
                <div class="module module-narrow module-shallow context-info">
                    <h2 class="module-heading"><i class="fa fa-building-o"></i> Organization</h2>
                    <section class="module-content">
                        <div class="image">
                            @if ($dataset->logo_organisasi != null)
                            <a href="{{ route('user.organisasiDetail', $dataset->kode_organisasi) }}">
                                <img src="/images/organisasi/{{ $dataset->logo_organisasi }}" width="200"
                                    alt="logo-organisasi">
                            </a>
                            @else
                            <a href="{{ route('user.organisasiDetail', $dataset->kode_organisasi) }}">
                                <img src="/images/assets/organisasi.png" width="200"
                                    alt="logo-organisasi">
                            </a>
                            @endif
                        </div>
                        <h1 class="heading">{{ $dataset->nama_organisasi }}</h1>
                        <p class="empty">{{ $dataset->deskOrg ?? 'Tidak ada deskripsi pada organisasi' }}</p>
                    </section>
                </div>
                <section class="module module-narrow social">
                    <h2 class="module-heading"><i class="fa fa-share-square-o"></i> Social</h2>
                    <ul class="nav nav-simple">
                        <li class="nav-item"><a
                                href="https://twitter.com/share?url=http://opendata.bogorkab.go.id/dataset/status-perkembangan-desa-pasirgaok"
                                target="_blank"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                        <li class="nav-item"><a
                                href="../login-1.php?u=http://opendata.bogorkab.go.id/dataset/status-perkembangan-desa-pasirgaok"
                                target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                    </ul>
                </section>
            </aside>
            <div class="primary col-sm-9 col-xs-12">
                <article class="module">
                    <header class="module-content page-header">
                        <ul class="nav nav-tabs">
                            <li id="breack-dataset" class="active"><a href="javascript:dataset('{{ $dataset->kode_dataset }}')"><i
                                        class="fa fa-sitemap"></i> Dataset</a></li>
                            <li id="breack-sektoral"><a href="javascript:sektoral('{{ $dataset->kode_dataset }}')"><i class="fa fa-users"></i>
                                    Sektoral</a></li>
                        </ul>
                    </header>
                    <div class="module-content" id="content-dataset">

                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script>
        $(document).ready(function(){
            dataset('{{ $dataset->kode_dataset }}');
        })

        function dataset(kodeDataset){
            $.ajax({
                type: 'POST',
                url: '{{ route('user.datasetExtra') }}',
                data: {
                    dataset: kodeDataset,
                    _token: '{{ csrf_token() }}'
                },
                success: res => {
                    $('#content-dataset').html(res)
                    $('#breack-dataset').addClass('active')
                    $('#breack-sektoral').removeClass('active')
                }
            })
        }

        function sektoral(kodeDataset){
            $.ajax({
                url: '{{ route('user.datasetExtra') }}',
                type: 'POST',
                data: {
                    sektoral: kodeDataset,
                    _token: '{{ csrf_token() }}'
                },
                success: res => {
                    $('#content-dataset').html(res)
                    $('#breack-sektoral').addClass('active')
                    $('#breack-dataset').removeClass('active')
                }
            })
        }

    </script>

@endsection
