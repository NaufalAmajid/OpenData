<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themes.getbootstrap.com/licenses/)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Login Dashboard Open Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page">
    <meta name="author" content="Themesberg">
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt Premium Bootstrap Dashboard - Sign in page">
    <meta property="og:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Sign in page">
    <meta property="twitter:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="/template/forAdmin/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/template/forAdmin/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/template/forAdmin/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/template/forAdmin/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/template/forAdmin/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="/template/forAdmin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="/template/forAdmin/vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="/template/forAdmin/css/volt.css" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    {{-- OTHER ASSETS HERE --}}
    <link rel="stylesheet" href="/otherAsset/css/bootstrap-icons.css">
</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image"
                    data-background-lg="/template/forAdmin/assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Please Sign In Here!</h1>
                            </div>
                            <form class="mt-4">
                                @csrf
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="isUsername">
                                            <i class="bi bi-emoji-smile fs-5"></i>
                                        </span>
                                        <input type="text" class="form-control fs-6" placeholder="Enter Your Usernamer"
                                            id="username" autocomplete="off" autofocus>
                                        <div id="validationOfUsername" class="invalid-feedback">
                                            username tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="bi bi-shield-lock-fill fs-5"></i>
                                            </span>
                                            <input type="password" placeholder="Enter Your Password"
                                                class="form-control fs-6" id="password" autocomplete="off">
                                            <div id="validationOfPassword" class="invalid-feedback">
                                                password tidak boleh kosong.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="button" id="btnSignIn" class="btn btn-gray-800">Sign in</button>
                                </div>
                            </form>
                            <div class="mt-3 mb-4 text-center">
                                <span class="fw-normal">Selamat Datang Sistem Informasi Open Data Kabupaten
                                    Klaten</span>
                            </div>
                            <div class="mt-3 mb-4 text-center">
                                <span class="fst-italic fw-bold" style="font-size: 13px;">Silahkan Kunjungi Sosial Media
                                    Kami</span>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                    aria-label="facebook button" title="facebook button">
                                    <i class="bi bi-facebook fs-5"></i>
                                </a>
                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                    aria-label="twitter button" title="twitter button">
                                    <i class="bi bi-instagram fs-5"></i>
                                </a>
                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500"
                                    aria-label="github button" title="github button">
                                    <i class="bi bi-whatsapp fs-5"></i>
                                </a>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal" style="font-size: 12px;">
                                    Copyright &copy; {{ date('Y') }} - Adinda Nur R.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
    <script src="/template/forAdmin/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="/template/forAdmin/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="/template/forAdmin/vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="/template/forAdmin/vendor/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="/template/forAdmin/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="/template/forAdmin/vendor/chartist/dist/chartist.min.js"></script>
    <script src="/template/forAdmin/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="/template/forAdmin/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="/template/forAdmin/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="/otherAsset/js/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="/template/forAdmin/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="/template/forAdmin/vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="/template/forAdmin/vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="/template/forAdmin/assets/js/volt.js"></script>

    <!-- Other Libraries JS -->
    <script src="/otherAsset/js/jquery-3.6.0.min.js"></script>
    <script src="/otherAsset/js/jquery-ui.min.js"></script>

    <!-- Custom JS -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('#username, #password').on('keyup', function() {

                if ($(this).val() != '') {

                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');

                } else {

                    $(this).removeClass('is-ivalid');
                    $(this).addClass('is-invalid');

                }

            });

            $('#btnSignIn').click(function() {
                var username = $('#username').val();
                var password = $('#password').val();
                var token = $("meta[name='csrf-token']").attr("content");

                if (username == '' && password == '') {
                    $('#username, #password').addClass('is-invalid');
                    $('#username').focus();
                    $('#validationOfUsername, #validationOfPassword').show();
                } else {

                    $.ajax({

                        type: 'POST',
                        url: '{{ route('processLogin') }}',
                        data: {
                            "username": username,
                            "password": password,
                            "_token": token
                        },
                        success: function(data) {

                            const result = JSON.parse(data);
                            const status = result.status;

                            if (status === 'success') {

                                swal.fire({
                                    icon: 'success',
                                    text: 'Login Berhasil',
                                    type: 'success',
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    window.location.href = result.url;
                                });

                            } else {
                                $('#username, #password').addClass('is-invalid');
                                $('#password').val('');
                                $('#username').focus();
                                $('#validationOfUsername, #validationOfPassword').show(function() {
                                    $('#validationOfUsername, #validationOfPassword').html(result.message);
                                });
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }

                    });

                }

            });
        });
    </script>
</body>

</html>
