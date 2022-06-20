<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <link rel="stylesheet" type="text/css"
        href="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/select2/select2.min.css">
    <link rel="stylesheet" type="text/css"
        href="/template/forUser/fanstatic/css/version2021-04-08T061538.15/main.min.css">
    <link rel="stylesheet" type="text/css"
        href="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/font-awesome/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="generator" content="ckan 2.8.7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Data Kabupaten Klaten</title>


    <link rel="shortcut icon" href="/template/forUser/base/images/logo-kab-bogor.ico">
    <link rel="stylesheet" href="/template/forUser/base/css/custom.css">

</head>


<body data-site-root="http://opendata.bogorkab.go.id/" data-locale-root="http://opendata.bogorkab.go.id/">


    <div class="sr-only sr-only-focusable"><a href="#content">Skip to content</a></div>




    <header class="account-masthead">
        <div class="container">

        </div>
    </header>

    <header class="navbar navbar-static-top masthead">

        <div class="container">
            <div class="navbar-right">
                <button data-target="#main-navigation-toggle" data-toggle="collapse" class="navbar-toggle collapsed"
                    type="button">
                    <span class="fa fa-bars"></span>
                </button>
            </div>
            <hgroup class="header-image navbar-left">

                <a class="logo" href="index.htm"><img
                        src="template/forUser/uploads/admin/2021-04-07-082521.948376logo-open-data-kab-bogor.png"
                        alt="Open Data Kabupaten Bogor" title="Open Data Kabupaten Bogor"></a>

            </hgroup>

            <div class="collapse navbar-collapse" id="main-navigation-toggle">

                <nav class="section navigation">
                    <ul class="nav nav-pills">
                        <li id="btnDataset"><a href="javascript:PageDataset()">Dataset</a></li>
                        <li id="btnOrganisasi"><a href="javascript:PageOrganisasi()">Organisasi</a></li>
                        <li id="btnSektoral"><a href="javascript:PageSektoral()">Sektoral</a></li>
                        <li id="btnTentang"><a href="javascript:PageTentang()">Tentang</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <div class="content" id="content">

    </div>

    <footer class="site-footer">
        <div class="container">

            <div class="row">
                <div class="col-md-8 footer-links">

                    <ul class="list-unstyled">

                        <li><strong>Link Penting</strong></li>

                    </ul>
                    <ul class="list-unstyled">


                        <li><a href="https://bogorkab.go.id/">Pemerintah Kabupaten Bogor</a></li>
                        <li><a href="https://bogorkab.bps.go.id/">Badan Pusat Statistik Kabupaten Bogor</a></li>
                        <li><a href="https://data.go.id/">Satu Data Indonesia</a></li>
                        <li><a href="https://data.jabarprov.go.id/">Open Data Provinsi Jawa Barat</a></li>
                        <li><a href="https://geoportal.bogorkab.go.id/">Bogor Geodatabase Untuk Satu Data Pemetaan</a>
                        </li>
                        <li><a href="https:ckan.org/">CKAN Open Data</a></li>

                    </ul>

                </div>
                <div class="col-md-4 attribution" style="text-align: center;">

                    <p><strong>Total Kunjungan</strong></p>
                    <p>
                        <script type="text/javascript" src="/template/forUser/count/7vsp"></script>
                    </p>
                    <p>© {{ date('Y') }} Kabupaten Klaten</p>

                </div>
            </div>

        </div>
    </footer>

    <script>
        document.getElementsByTagName('html')[0].className += ' js';
    </script>
    <script type="text/javascript"
        src="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/jquery.min.js"></script>
    <script type="text/javascript"
        src="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/bundlebootstrap/js/bootstrap.min.js%3Bjed.min.js%3Bmoment-with-locales.min.js%3Bselect2/select2.min.js') }}">
    </script>
    <script type="text/javascript"
        src="/template/forUser/fanstatic/base/version2021-04-06T024817.49/bundleplugins/jquery.inherit.min.js%3Bplugins/jquery.proxy-all.min.js%3Bplugins/jquery.url-helpers.min.js%3Bplugins/jquery.date-helpers.min.js%3Bplugins/followers-counter..js') }}">
    </script>
    <script>
        $(document).ready(function() {
            PageHome();
        });

        function PageHome(){
            $.get('{{ route('user.index') }}', function(data) {
                $('#content').html(data);
                $('#btnDataset, #btnOrganisasi, #btnSektoral, #btnTentang').removeClass('active');
            });
        }

        function PageDataset() {
            $.get('{{ route('user.dataset') }}', function(data) {
                $('#content').html(data);
                $('#btnDataset').addClass('active');
                $('#btnOrganisasi, #btnSektoral, #btnTentang').removeClass('active');
            });
        }

        function PageOrganisasi() {
            $.get('{{ route('user.organisasi') }}', function(data) {
                $('#content').html(data);
                $('#btnOrganisasi').addClass('active');
                $('#btnDataset, #btnSektoral, #btnTentang').removeClass('active');
            });
        }

        function PageSektoral() {
            $.get('{{ route('user.sektoral') }}', function(data) {
                $('#content').html(data);
                $('#btnSektoral').addClass('active');
                $('#btnDataset, #btnOrganisasi, #btnTentang').removeClass('active');
            });
        }

        function PageTentang() {
            $.get('{{ route('user.tentang') }}', function(data) {
                $('#content').html(data);
                $('#btnTentang').addClass('active');
                $('#btnDataset, #btnOrganisasi, #btnSektoral').removeClass('active');
            });
        }

    </script>
    @yield('script')
</body>

</html>
