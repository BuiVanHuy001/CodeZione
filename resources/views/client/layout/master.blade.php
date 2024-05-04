<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>
        CodeZone | Lập trình là niềm đam mê
    </title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link rel="icon" type="image/png" href="{{ asset('client_assets/images/logo/logo-vector.png') }}"/>

    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('client_assets/css/vendor/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/vendor/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/vendor/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/sal.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/feather.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/fontawesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/euclid-circulara.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/swiper.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/magnify.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/odometer.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/animation.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/jquery-ui.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/magnigy-popup.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/plugins/plyr.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client_assets/css/style.css') }}"/>
    @yield('cus_css')
</head>

<body class="rbt-header-sticky">
@include('client.blocks.header')
@yield('content')
<!-- Start Footer aera -->
@include('client.blocks.footer')
<!-- End Footer aera -->
<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>

<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{ asset('client_assets/js/vendor/modernizr.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('client_assets/js/vendor/jquery.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('client_assets/js/vendor/bootstrap.min.js') }}"></script>
<!-- sal.js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="{{ asset('client_assets/js/vendor/sal.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/swiper.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/magnify.min.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/jquery-appear.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/odometer.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/backtotop.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/isotop.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/imageloaded.js') }}"></script>

<script src="{{ asset('client_assets/js/vendor/wow.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/waypoint.min.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/easypie.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/text-type.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/jquery-one-page-nav.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/jquery-ui.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/magnify-popup.min.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/paralax-scroll.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/paralax.min.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/countdown.js') }}"></script>
<script src="{{ asset('client_assets/js/vendor/plyr.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('client_assets/js/main.js') }}"></script>
@if(Auth::check())
    <script>
        window.onload = function() {
            let message = "{{ session('message') }}";
            let icon = "{{ session('icon') ?? 'success' }}";
            if (message !== "") {
                Swal.fire({
                    position: "top-end",
                    icon: icon,
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
        $('.add-to-cart-btn').on( "click", function() {
            let url = $(this).data('url');
            $.ajax({
                url: url,
                method: 'POST',
                data: {url: url,  _token: '{{ csrf_token() }}'},
                success: function(response) {
                    Swal.fire({
                        icon: response.type,
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();
                }
            });
        });
        $('.remove-item-cart').on( "click", function() {
            let url = $(this).data('url');
            let id = $(this).data('id');
            $.ajax({
                url: url,
                method: 'POST',
                data: {url: url,  _token: '{{ csrf_token() }}'},
                success: function(response) {
                    $('#li-' + id).remove()
                }
            });
        });
    </script>
@endif
@yield('cus_js')
</body>
</html>
