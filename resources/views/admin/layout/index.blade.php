<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang quản lý-Music</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{!! asset('assets/css/normalize.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/thumbnail.css') !!}">
    <link rel="stylesheet" href="{!! asset('dist/css/selectize.default.css') !!}">

    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{!! asset('assets/scss/style.css') !!}">
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->
    <link href="{!! asset('assets/css/font-css.css') !!}" rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"> --}}

</head>

<body>
    <div id="wrapper">
        <div style="width: 100%;">

               @include('admin.layout.menu')

            <div style="width: 85%;" id="right-panel" class="right-panel">
                @include('admin.layout.header')
                @yield('content')
            </div>
        </div>

    </div>
    <script src="{!! asset('assets/js/vendor/jquery-2.1.4.min.js') !!}"></script>
    <script src="{!! asset('assets/js/popper.min.js') !!}"></script>
    <script src="{!! asset('assets/js/plugins.js') !!}"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/datatables.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/buttons.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/jszip.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/buttons.colVis.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/data-table/datatables-init.js') !!}"></script>
    <script src="{!! asset('ckeditor/ckeditor.js') !!} "></script>
    <script src="{!! asset('dist/js/standalone/selectize.min.js') !!} "></script>



    @yield('script')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });

    </script>
</body>

</html>
