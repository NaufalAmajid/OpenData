<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('template/forUser/fanstatic/vendor/version2021-04-07T081732.64/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('template/forUser/fanstatic/css/version2021-04-08T061538.15/main.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('template/forUser/fanstatic/vendor/version2021-04-07T081732.64/font-awesome/css/font-awesome.min.css') }}">

    <meta charset="utf-8">
    <meta name="generator" content="ckan 2.8.7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Data Kabupaten Klaten</title>


    <link rel="shortcut icon" href="{{ asset('template/forUser/base/images/logo-kab-bogor.ico') }}">
    <link rel="stylesheet" href="{{ asset('template/forUser/base/css/custom.css') }}">

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
                        src="{{ asset('template/forUser/uploads/admin/2021-04-07-082521.948376logo-open-data-kab-bogor.png') }}"
                        alt="Open Data Kabupaten Bogor" title="Open Data Kabupaten Bogor"></a>

            </hgroup>

            <div class="collapse navbar-collapse" id="main-navigation-toggle">

                <nav class="section navigation">
                    <ul class="nav nav-pills">
                        <li><a href="dataset.html">Dataset</a></li>
                        <li><a href="organization.html">Organisasi</a></li>
                        <li><a href="group.html">Sektoral</a></li>
                        <li><a href="about.html">Tentang</a></li>
                        <li><a href="pages/visualisasi-.html">Visualisasi</a></li>
                        <li><a href="pages/bantuan.html">Bantuan</a></li>
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

                    <p><strong>Total Kunjungan</strong></p>
                    <p>
                        <script type="text/javascript" src="{{ asset('template/forUser/count/7vsp') }}"></script>
                    </p>
                    <p>© 2020 Kabupaten Bogor</p>

                </div>
            </div>

        </div>
    </footer>

    <script>
        document.getElementsByTagName('html')[0].className += ' js';
    </script>
    <script type="text/javascript"
        src="{{ asset('template/forUser/fanstatic/vendor/version2021-04-07T081732.64/jquery.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('template/forUser/fanstatic/vendor/version2021-04-07T081732.64/bundlebootstrap/js/bootstrap.min.js%3Bjed.min.js%3Bmoment-with-locales.min.js%3Bselect2/select2.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('template/forUser/fanstatic/base/version2021-04-06T024817.49/bundleplugins/jquery.inherit.min.js%3Bplugins/jquery.proxy-all.min.js%3Bplugins/jquery.url-helpers.min.js%3Bplugins/jquery.date-helpers.min.js%3Bplugins/followers-counter..js') }}">
    </script>
</body>

</html>
