@extends('layout.userLayout.layoutUser')

@section('content')
<div role="main">
    <div id="content" class="container">
        <div class="flash-messages">

        </div>
        <div class="toolbar">
            <ol class="breadcrumb">
                <li class="home"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i><span> Home</span></a></li>
                <li class="active"><a class=" active" href="{{ route('user.organisasi') }}">Organisasi</a></li>
            </ol>
        </div>
        <div class="row wrapper">
            <aside class="secondary col-sm-3">
                <div class="module module-narrow module-shallow">
                    <h2 class="module-heading">
                        <i class="fa fa-info-circle"></i>
                        Apa itu organisasi?
                    </h2>
                    <div class="module-content">
                        <p>
                            Organisasi pada Open Data Kabupaten Bogor merupakan Perangkat Daerah, Unit Kerja Pemerintah
                            Kabupaten Bogor.
                        </p>
                    </div>
                </div>
            </aside>
            <div class="primary col-sm-9 col-xs-12">
                <article class="module">
                    <div class="module-content">
                        <h1 class="hide-heading">Organisasi</h1>
                        <form id="organization-search-form" class="search-form no-bottom-border" method="get"
                            data-module="select-switch">
                            <div class="input-group search-input-group">
                                <input aria-label="Cari Organisasi ..." id="searchOrganisasi" type="text"
                                    class="form-control input-lg" name="searchOrganisasi" value="" autocomplete="off"
                                    placeholder="Cari Organisasi ...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="button" value="search" disabled>
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <h2 id="textOrganisasiFind"></h2>
                        </form>
                        <ul class="media-grid" data-module="media-grid">
                            <div class="listOrganisasi"></div>
                            {{-- <li class="clearfix js-hide"></li> --}}
                        </ul>
                        {{-- <div class='pagination-wrapper'>
                            <ul class='pagination'>
                                <li class="active"><a href="organization-1.html?q=&amp;sort=&amp;page=1">1</a></li>
                                <li><a href="organization-2.html?q=&amp;sort=&amp;page=2">2</a></li>
                                <li><a href="organization-3.html?q=&amp;sort=&amp;page=3">3</a></li>
                                <li><a href="organization-4.html?q=&amp;sort=&amp;page=4">4</a></li>
                                <li><a href="organization-2.html?q=&amp;sort=&amp;page=2">»</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(() => {
        listOrganisasi();
        $('#searchOrganisasi').on('keyup', () => {
            listOrganisasi();
        });
    })

    function listOrganisasi(){
        var search = $('#searchOrganisasi').val();

        $.ajax({
            type: 'POST',
            url: '{{ route('user.organisasiList') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                search: search
            },
            success: res => {
                $('.listOrganisasi').html(res.view);
                $('#textOrganisasiFind').html(res.organisasi.length + ' Organisasi ditemukan');
            }
        })
    }

</script>

@endsection

