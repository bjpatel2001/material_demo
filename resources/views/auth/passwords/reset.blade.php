@extends('layouts.login')
@section('pageTitle')
    {{__('app.reset_form',["app_name"=> __('app.app_name')])}}
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

    <div id="login-page" class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" action="{{ url('/password/reset') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="{{url('material/images/login-logo.png')}}" alt=""
                             class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Reset Password</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" placeholder="Email id" name="email" autocomplete="off"
                               class="form-control" value="{{ $email or old('email') }}"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" name="password" placeholder="New Password" required
                               autocomplete="off" class="form-control"/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" name="password_confirmation"
                               placeholder="Confirm Password" class="form-control" required/>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="guard" value="1"/>
                <div class="row">
                    <div class="input-field col s12">
                        <button data-dismiss="modal" type="submit"
                                class="btn btn-primary btn-xl btn waves-effect waves-light col s12">Reset Password
                        </button>
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
