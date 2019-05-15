@extends('layouts.login')
@section('pageTitle')
    {{__('app.login_title',["app_name"=> __('app.app_name')])}}
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
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" action="{{ url('/login') }}"  method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="{{url('material/images/login-logo.png')}}" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Material Design Admin Template</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                        <label for="email" class="center-align">Email</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" maxlength="15" name="password" required />
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input type="checkbox" name="remember" value="1" id="remember" />
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl btn waves-effect waves-light col s12">{{trans('app.sign_in')}}</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="{{ url('/password/reset') }}">Forgot password ?</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>



@endsection
@push('externalJsLoad')

@endpush
@push('internalJsLoad')
<script type="text/javascript">

</script>
@endpush
