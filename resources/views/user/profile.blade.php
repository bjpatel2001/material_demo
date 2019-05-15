@extends('layouts.common')
@section('pageTitle')
    {{__('app.default_profile_title',["app_name" => __('app.app_name'),"module"=> __('app.user')])}}
@endsection
@push('externalCssLoad')
@endpush
@push('internalCssLoad')
@endpush
@section('content')
    <!-- START CONTENT -->
    <section id="content">
        <div class="container">
            <div class="section">
                {{--<p class="caption">USER PROFILE</p>
                <div class="divider"></div>--}}
                @if (count($errors) > 0)
                    <div id="card-alert" class="card red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="card-panel">
                            <h4 class="header2">USER PROFILE</h4>
                            <div class="row">
                                <form action="{{url('/user/update')}}" method="post" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input id="first_name" name="first_name" type="text" required value="{{$details->first_name}}"/>
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input id="last_name" name="last_name" type="text" required value="{{$details->last_name}}"/>
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-communication-email prefix"></i>
                                            <input id="email" type="email" name="email" value="{{$details->email}}" readonly>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input id="user_role" type="text" value="{{($details->Role)?$details->Role->code:"---"}}" readonly />
                                            <input type="hidden" name="role_id" id="role_id"   value="{{$details->role_id}}" />
                                            <label for="user_role">User Role</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input id="parent" type="text" value="{{($details->ParentUser)?$details->ParentUser->name:"---"}}" readonly />
                                            <input type="hidden" name="parent_id" id="parent_id" value="{{$details->parent_id}}" />
                                            <label for="parent">Reporting Head</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="change_redirect_state" id="change_redirect_state" value="1" />

                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" value="{{$details->id}}" />
                                    <div class="row">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">UPDATE PROFILE
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END CONTENT -->
    </section>
@endsection

@push('externalJsLoad')
@endpush
@push('internalJsLoad')

@endpush