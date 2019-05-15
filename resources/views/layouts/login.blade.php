<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{url('material/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{url('material/images/favicon/apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{url('material/images/favicon/mstile-144x144.png')}}">

    <link rel="stylesheet" type="text/css" href="{{url('material/css/materialize.css')}}" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{url('material/css/style.css')}}" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{url('material/css/custom/custom-style.css')}}"
          media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{url('material/css/layouts/page-center.css')}}"
          media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{url('material/js/plugins/prism/prism.css')}}"
          media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{url('material/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}"
          media="screen,projection"/>


    <title>@yield('pageTitle')</title>
    @stack('externalCssLoad')
    @stack('internalCssLoad')
</head>

<body class="cyan">
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
        <div id="card-alert" class="card red">
            <div class="card-content white-text">
                <p><i class="mdi-alert-error"></i> DANGER : {{ Session::get('alert-' . $msg) }}</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
@endforeach
@yield('content')

<!-- Mainly scripts -->
@stack('externalJsLoad')
@stack('internalJsLoad')
<!-- jQuery Library -->
<script src="{{url('material/js/plugins/jquery-1.11.2.min.js')}}" type="text/javascript"></script>
<!--materialize js-->
<script type="text/javascript" src="{{url('material/js/materialize.js')}}"></script>
<script type="text/javascript" src="{{url('material/js/plugins/prism/prism.js')}}"></script>
<script type="text/javascript" src="{{url('material/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!--prism-->

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{url('material/js/plugins.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{url('material/js/custom-script.js')}}"></script>
<!--Material Theme JS Ends-->
<script src="{{url('js/config.js')}}" type="text/javascript"></script>
<script src="{{url('js/app.js')}}" type="text/javascript"></script>

</body>
</html>