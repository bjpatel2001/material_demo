<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="{{url('img/favicon/manifest.json')}}">
    <title>@yield('pageTitle')</title>
    <link rel="icon" href="{{url('material/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{url('material/images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{url('material/images/favicon/mstile-144x144.png')}}">

    <!-- Core CSS-->

    <link rel="stylesheet" type="text/css" href="{{url('material/css/materialize.css')}}" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="{{url('material/css/style.css')}}" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="{{url('material/css/custom/custom-style.css')}}" media="screen,projection" />

    <link rel="stylesheet" type="text/css" href="{{url('css/plugins/dataTables.bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/plugins/jquery.loadmask.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/plugins/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/plugins/select.dataTables.min.css')}}" />

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{url('material/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{url('material/js/plugins/jvectormap/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{url('material/js/plugins/chartist-js/chartist.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">



    @stack('externalCssLoad')
    @stack('internalCssLoad')
    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}/";
        var csrf_token = "<?php echo csrf_token(); ?>";

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<div class="be-wrapper be-collapsible-sidebar">

    <div id="load-nav">
        @include('layouts.header')
    </div>

    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

    @include('layouts.sidebar')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            <?php
            if($msg == 'success'){
              $card = "<div id='card-alert' class='card green'>";
            }elseif($msg == 'warning' || 'danger'){
                $card = "<div id='card-alert' class='card red'>";
            }else{
                $card = "<div id='card-alert' class='card light-blue'>";
            }
            ?>
            @if(Session::has('alert-' . $msg))
                <?php echo $card; ?>
                    <div class="card-content white-text">
                        <p><i class="mdi-alert-error"></i> {{ Session::get('alert-' . $msg) }}</p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        @endforeach
    </div>

    @yield('content')

    @include('layouts.rightsidebar')
        <!-- END WRAPPER -->
        </div>
    </div>
    @include('layouts.footer')




<!--Material Theme JS Starts-->

<!-- ================================================
   Scripts
   ================================================ -->

<!-- jQuery Library -->
<script src="{{url('material/js/plugins/jquery-1.11.2.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/dataTables.buttons.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/dataTables.responsive.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/dataTables.select.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<!--materialize js-->
<script type="text/javascript" src="{{url('material/js/materialize.js')}}"></script>
<!--prism
<script type="text/javascript" src="js/prism/prism.js"></script>-->
<!--scrollbar-->
<script type="text/javascript" src="{{url('material/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

<!-- chartist -->
<script type="text/javascript" src="{{url('material/js/plugins/chartist-js/chartist.min.js')}}"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{url('material/js/plugins.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{url('material/js/custom-script.js')}}"></script>
<!--Material Theme JS Ends-->


<script src="{{url('js/config.js')}}" type="text/javascript"></script>
<script src="{{url('js/app.js')}}" type="text/javascript"></script>
<script src="{{url('js/plugins/validate/jquery.validate.min.js')}}" type="text/javascript"></script>


@stack('externalJsLoad')
@stack('internalJsLoad')

</body>
</html>