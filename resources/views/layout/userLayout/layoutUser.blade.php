<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="generator" content="ckan 2.8.7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token-csrf" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
        href="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/select2/select2.min.css">
    <link rel="stylesheet" type="text/css"
        href="/template/forUser/fanstatic/css/version2021-04-08T061538.15/main.min.css">
    <link rel="stylesheet" type="text/css"
        href="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/font-awesome/css/font-awesome.min.css">
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
                        <li class="{{ Request::is('user/dataset*') ? 'active' : '' }}"><a href="{{ route('user.dataset') }}">Dataset</a></li>
                        <li class="{{ Request::is('user/organisasi*') ? 'active' : '' }}"><a href="{{ route('user.organisasi') }}">Organisasi</a></li>
                        <li class="{{ Request::is('user/sektoral*')  ? 'active' : ''}}"><a href="{{ route('user.sektoral') }}">Sektoral</a></li>
                        <li class="{{ Request::is('user/tentang*') ? 'active' : '' }}"><a href="{{ route('user.tentang') }}">Tentang</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    @yield('content')

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
        src="/template/forUser/fanstatic/vendor/version2021-04-07T081732.64/bundlebootstrap/js/bootstrap.min.js/select2.min.js">
    </script>
    <script type="text/javascript"
        src="/template/forUser/fanstatic/base/version2021-04-06T024817.49/bundleplugins/jquery.inherit/jquery.proxy-all/jquery.url-helpers/jquery.date-helpers/followers-counter.js">
    </script>
    @yield('script')
</body>

</html>
