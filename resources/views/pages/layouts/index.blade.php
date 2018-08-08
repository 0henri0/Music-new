<!DOCTYPE HTML>
<html>

<head>
    <title>Mosaic a Entertainment Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

    function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('pages/css/bootstrap.css') !!}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{!! asset('pages/css/style.css') !!}" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{!! asset('pages/css/font-awesome.css') !!}" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="{!! asset('pages/css/icon-font.css') !!}" type='text/css' />
    <!-- //lined-icons -->
    <!-- Meters graphs -->
    <script src="{!! asset('pages/js/jquery-2.1.4.js') !!}"></script>
</head>
<!-- /w3layouts-agile -->

<body class="sticky-header left-side-collapsed" onload="initMap()">
    <section>
      @include('pages.layouts.menu')

      <div class="main-content">

      @include('pages.layouts.main')
       @yield('content')

           <!--notification menu end -->
    <!-- //header-ends -->
    <!-- /w3l-agileits -->
    <!-- //header-ends -->
    <div class="clearfix"></div>
    <!--body wrapper end-->
    <!-- /w3l-agile -->

      </div>
      @include('pages.layouts.footer')


    </section>
    <script src="{!! asset('pages/js/jquery.nicescroll.js') !!}"></script>
    <script src="{!! asset('pages/js/scripts.js') !!}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('pages/js/bootstrap.js') !!}"></script>
</body>

</html>
