<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @include('includes.favicons')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bourbon') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('css/pace/pace-theme-flash.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nvd3/nv.d3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mapplic/mapplic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-metrojs/MetroJs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/themes/light.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrapFileInput.js') }}" defer></script>
    <script src="{{ asset('js/modernizr.custom.js') }}" defer></script>
    <script src="{{ asset('js/waitingfor.js') }}" defer></script>
</head>
<body class="fixed-header  dashboard @if(Session::get('pinned') == 'true') sidebar-visible menu-pin @endif ">
    <div class="div_load">
        <div class="loader"></div>
    </div>

    @include('Admin.includes.menu_lateral')
    <div class="page-container">
        @include('Admin.includes.menu_superior')
        <div class="page-content-wrapper">
            <div class="content p-b-70">
                <!-- START JUMBOTRON -->
                    <div class="jumbotron">
                        <div class="container-fluid sm-p-l-20 sm-p-r-20">
                            <div class="inner" style="transform: translateY(0px); opacity: 1;">
                                <!-- START BREADCRUMB -->
                                @yield('breadcrumb')
                            </div>
                        </div>  
                    </div>
                    <!-- END BREADCRUMB -->
                    @include('flash::message')
                    @yield('content')
            </div>
            @include('Admin.includes.footer')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-maskmoney.js') }}" defer></script>
    
    <script src="{{ asset('js/jquery.maskedinput.js') }}" defer></script>
    <script src="{{ asset('js/pace/pace.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('js/tether/tether.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery/jquery-easy.js') }}" defer></script>
    <script src="{{ asset('js/jquery-unveil/jquery.unveil.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ios-list/jquery.ioslist.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-actual/jquery.actual.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-scrollbar/jquery.scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('js/select2/select2.full.min.js') }}" defer></script>
    <script src="{{ asset('js/classie/classie.js') }}" defer></script>
    <script src="{{ asset('js/switchery/switchery.min.js') }}" defer></script>
    <script src="{{ asset('js/mapplic/hammer.js') }}" defer></script>
    <script src="{{ asset('js/mapplic/jquery.mousewheel.js') }}" defer></script>
    <script src="{{ asset('js/mapplic/mapplic.js') }}" defer></script>
    <script src="{{ asset('js/jquery-metrojs/MetroJs.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-sparkline/jquery.sparkline.min.js') }}" defer></script>
    <script src="{{ asset('js/skycons/skycons.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker/bootstrap-datepicker.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js') }}" defer></script>

    <script src="{{ asset('js/dropzone/dropzone.js') }}" defer></script>
    <script src="{{ asset('js/jquery-inputmask/jquery.inputmask.min.js') }}" defer></script>

    <script src="{{ asset('js/pages.js') }}" defer></script>

    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/handlebars.js') }}" defer></script>

    <script src="{{ asset('js/scripts.js') }}" defer></script>

    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/summernote.min.js') }}" defer></script>

    <script>
        $(document).ready(function(){
            $(".waiting").on("click", function(event){
                var text = $(this).data('waitingtext');
                var time = 2000;

                waiting_layer(text, time);
            });

            $("form").on("submit", function(event){
                var text = '';
                var time = null;

                waiting_layer(text, time);
            });

            $("#pin_sidebar").on("click", function(){
                setTimeout(function(){
                    var pinned = $("body").hasClass('menu-pin');

                    $.ajax({
                        url: "/extranet/set_pin",
                        type: "get",
                        data: {pinned : pinned},
                        dataType: "json",
                        success: function(data){
                            console.log(data);
                        }
                    });
                }, 500)

            });
        });
    </script>

    @stack('scripts')

</body>
</html>
