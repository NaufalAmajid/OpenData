@extends('layout.userLayout.layoutUser')

@section('content')
<div role="main">
    <div id="content" class="container">
        <div class="flash-messages">

        </div>
        <div class="toolbar">
            <ol class="breadcrumb">
                <li class="home"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i><span> Home</span></a></li>
                <li class="active"><a class=" active" href="{{ route('user.sektoral') }}">Sektoral</a></li>
            </ol>
        </div>
        <div class="row wrapper">
            <aside class="secondary col-sm-3">
                <div class="module module-narrow module-shallow">
                    <h2 class="module-heading">
                        <i class="fa fa-info-circle"></i>
                        Apa itu Sektoral?
                    </h2>
                    <div class="module-content">
                        <p>
                            Sektoral pada Open Data Kabupaten Bogor merupakan kategori data menurut pemerintahan.
                        </p>
                    </div>
                </div>
            </aside>
            <div class="primary col-sm-9 col-xs-12">
                <article class="module">
                    <div class="module-content">
                        <h1 class="hide-heading">Sektoral</h1>
                        <form id="organization-search-form" class="search-form no-bottom-border" method="get"
                            data-module="select-switch">
                            <div class="input-group search-input-group">
                                <input aria-label="Cari Sektoral ..." id="searchSektoral" type="text"
                                    class="form-control input-lg" name="searchSektoral" autocomplete="off"
                                    placeholder="Cari Sektoral ...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="button" value="search" disabled>
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <h2 id="textSektoralFind"></h2>
                        </form>
                        <ul class="media-grid" data-module="media-grid">
                            <div class="listSektoral"></div>
                            <li class="clearfix js-hide"></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        listSektoral();
        $('#searchSektoral').on('keyup', function () {
            listSektoral();
        });
    })

    function listSektoral(){
        var search = $('#searchSektoral').val();
        $.ajax({
            type: 'POST',
            url: '{{ route('user.sektoralList') }}',
            data: {
                _token: '{{ csrf_token() }}',
                search: search
            },
            success: response => {
                $('.listSektoral').html(response.view);
                $('#textSektoralFind').html(response.sektoral.length + ' Sektoral ditemukan');
            }
        });
    }
</script>
@endsection
