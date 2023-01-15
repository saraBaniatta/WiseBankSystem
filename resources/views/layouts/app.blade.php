<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env("APP_NAME") }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset("images/favicon.ico")}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{asset("css/typography.css")}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset("css/responsive.css")}}">

    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
</head>
<body class="sidebar-main-active right-column-fixed">
<div class="wrapper">
    <!-- Sidebar  -->
    @include("layouts.sidebar")
    <!-- TOP Nav Bar -->
    @include("layouts.navbar")
    <!-- TOP Nav Bar END -->

    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- color-customizer END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<!-- Appear JavaScript -->
<script src="{{asset("js/jquery.appear.js")}}"></script>
<!-- Countdown JavaScript -->
<script src="{{asset("js/countdown.min.js")}}"></script>
<!-- Counterup JavaScript -->
<script src="{{asset("js/waypoints.min.js")}}"></script>
<script src="{{asset("js/jquery.counterup.min.js")}}"></script>
<!-- Wow JavaScript -->
<script src="{{asset("js/wow.min.js")}}"></script>
<!-- Apexcharts JavaScript -->
<script src="{{asset("js/apexcharts.js")}}"></script>
<!-- Slick JavaScript -->
<script src="{{asset("js/slick.min.js")}}"></script>
<!-- Select2 JavaScript -->
<script src="{{asset("js/select2.min.js")}}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{asset("js/owl.carousel.min.js")}}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{asset("js/smooth-scrollbar.js")}}"></script>
<!-- lottie JavaScript -->
<script src="{{asset("js/lottie.js")}}"></script>
<!-- am core JavaScript -->
<script src="{{asset("js/core.js")}}"></script>
<!-- am charts JavaScript -->
<script src="{{asset("js/charts.js")}}"></script>
<!-- am animated JavaScript -->
<script src="{{asset("js/animated.js")}}"></script>
<!-- am kelly JavaScript -->
<script src="{{asset("js/kelly.js")}}"></script>
<!-- am maps JavaScript -->
<script src="{{asset("js/maps.js")}}"></script>
<!-- am worldLow JavaScript -->
<script src="{{asset("js/worldLow.js")}}"></script>
<!-- Style Customizer -->
<script src="{{asset("js/style-customizer.js")}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{asset("js/chart-custom.js")}}"></script>
<!-- Custom JavaScript -->
<script src="{{asset("js/custom.js")}}"></script>
</body>


</html>
