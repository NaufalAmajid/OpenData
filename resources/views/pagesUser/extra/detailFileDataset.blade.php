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
                <li><a href="{{ route('user.organisasiDetail', $dataset->kode_organisasi) }}">{{ substr($dataset->nama_organisasi,0,18) . '...' }}</a></li>
                <li><a href="{{ route('user.datasetDetail', $dataset->kode_dataset) }}">{{ substr($dataset->judul_dataset,0,17) . '...' }}</a></li>
                <li class="active"><a href="{{ route('user.datasetDetail', $dataset->kode_dataset) }}">{{ substr($dataset->judul_dataset,0,17) . '...' }}</a></li>
            </ol>
        </div>
        <div class="row wrapper no-nav">
            <section class="module module-resource">
                <div class="module-content">
                    <div class="actions">
                        <ul>
                            <li>
                                <div class="btn-group">
                                    <a class="btn btn-primary resource-url-analytics resource-type-None"
                                        href="{{ asset('storage/datasetFile/' . $fileDataset->nama_file) }}" target="_blank">
                                        <i class="fa fa-arrow-circle-o-down"></i> Download
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-heading">{{ $dataset->judul_dataset }}</h1>
                    <div class="prose notes" property="rdfs:label">
                        <p>{{ strtolower($dataset->judul_dataset) }}</p>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-plain">
                        <li class=" active" data-id="#">
                            <a href="#"
                                data-id="#">
                                @switch(strtolower($fileDataset->ekstensi_file))
                                    @case('pdf')
                                        <i class="fa icon fa-file-pdf-o"></i>
                                        @break
                                    @case('doc')
                                    @case('docx')
                                        <i class="fa icon fa-file-word-o"></i>
                                        @break
                                    @case('xls')
                                    @case('csv')
                                    @case('xlsx')
                                        <i class="fa icon fa-file-excel-o"></i>
                                        @break
                                    @default
                                        <i class="fa icon fa-file-o"></i>
                                        @break
                                @endswitch
                                {{ strtoupper($fileDataset->ekstensi_file) }}
                            </a>
                        </li>
                    </ul>
                    <div class="resource-view">
                        <div class="resource-view">
                            <p class="desc"></p>
                            <div class="m-top ckanext-datapreview">
                                @switch(strtolower($fileDataset->ekstensi_file))
                                    @case('pdf')
                                        <object data="{{ asset('storage/datasetFile/' . $fileDataset->nama_file) }}" type="application/pdf" width="100%" height="100%">
                                            <p>It appears you don't have a PDF plugin for this browser.
                                                No worries, you can <a href="{{ asset('storage/datasetFile/' . $fileDataset->nama_file) }}">click here to download the PDF file.</a></p>
                                        @break
                                    @default
                                        <iframe src="{{ $fileDataset->link_file }}" frameborder="0" style="margin:auto; max-height:100%; min-height:100vh; min-width:100%;"></iframe>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="secondary col-sm-3">
                <section class="module module-narrow resources">
                    <h2 class="module-heading"><i class="fa fa-files-o"></i> Resources</h2>
                    <ul class="list-unstyled nav nav-simple">
                        <li class="nav-item active">
                            <a class=" active"
                                href="{{ route('user.datasetDetailFile', $fileDataset->id) }}"><span>{{ substr($dataset->judul_dataset,0,14) . '...' }}</span></a>
                        </li>
                    </ul>
                </section>
                <section class="module module-narrow social">
                    <h2 class="module-heading"><i class="fa fa-share-square-o"></i> Social</h2>
                    <ul class="nav nav-simple">
                        <li class="nav-item"><a
                                href="https://twitter.com/share?url=http://opendata.bogorkab.go.id/dataset/data-rekapitulasi-status-penggunaan-barang-milik-daerah/resource/92eceffb-4c2b-4a88-b6d5-3966af5204e1"
                                target="_blank"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                        <li class="nav-item"><a
                                href="../../../login-1296.php?u=http://opendata.bogorkab.go.id/dataset/data-rekapitulasi-status-penggunaan-barang-milik-daerah/resource/92eceffb-4c2b-4a88-b6d5-3966af5204e1"
                                target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                    </ul>
                </section>
            </aside>
            <div class="primary col-sm-9 col-xs-12">
                <section class="module">
                    <div class="module-content">
                        <h2>Additional Information</h2>
                        <table class="table table-striped table-bordered table-condensed"
                            data-module="table-toggle-more">
                            <thead>
                                <tr>
                                    <th scope="col">Field</th>
                                    <th scope="col">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Data last updated</th>
                                    <td>{{ $dataset->updated_at->format('M d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Created</th>
                                    <td>{{ $dataset->created_at->format('M d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Format</th>
                                    <td>{{ strtoupper($fileDataset->ekstensi_file) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">License</th>
                                    <td>
                                        <a rel="dc:rights">{{ $dataset->lisensi }}</a>
                                    </td>
                                </tr>
                                <tr class="toggle-more">
                                    <th scope="row">Mimetype</th>
                                    <td>application/{{ strtolower($fileDataset->ekstensi_file) }}</td>
                                </tr>
                                <tr class="toggle-more">
                                    <th scope="row">State</th>
                                    <td>active</td>
                                </tr>
                                <tr class="toggle-more">
                                    <th scope="row">Url type</th>
                                    <td>upload</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
