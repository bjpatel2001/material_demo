@extends('layouts.login')
@section('pageTitle')
    {{__('app.forgot_form',["app_name"=> __('app.app_name')])}}
@endsection
@push('externalCssLoad')

@endpush
@push('internalCssLoad')
<script type="text/javascript">
    var baseUrl = "{{ url('/') }}/";
    var csrf_token = "<?php echo csrf_token(); ?>";
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
@endpush
@section('content')

   {{-- <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container forgot-password">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading"><img src="{{url('img/mainlogo.png')}}" alt="logo"  class="logo-img"><span class="splash-description">Forgot your password?</span></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}
                            <p>Don't worry, we'll send you an email to reset your password.</p>
                            <div class="form-group xs-pt-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" name="email" required placeholder="Your Email" autocomplete="off" class="form-control" value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            --}}{{--<p class="xs-pt-5 xs-pb-20">Don't remember your email? <a href="#">Contact Support</a>.</p>--}}{{--
                            <div class="form-group xs-pt-5">
                                <button type="submit" class="btn btn-block btn-primary btn-xl">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--            <div class="splash-footer">&copy; 2016 Your Company</div>-->
            </div>
        </div>
    </div>--}}

    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" action="{{ url('/password/email') }}"  method="post">
                {{ csrf_field() }}

                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="{{url('material/images/login-logo.png')}}" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Forgot your password?</p>
                    </div>
                </div>
                <p class="center login-form-text">Don't worry, we'll send you an email to reset your password.</p>
                <div class="row margin">

                    <div class="form-group xs-pt-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" required placeholder="Your Email" autocomplete="off" class="form-control" value="{{ old('email') }}" />
                        @if ($errors->has('email'))
                            <div id="card-alert" class="card red">
                                <div class="card-content white-text">
                                    <p><i class="mdi-alert-error"></i> {{ $errors->first('email') }}</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl btn waves-effect waves-light col s12">Reset Password</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection
@push('externalJsLoad')

@endpush
@push('internalJsLoad')
@endpush
