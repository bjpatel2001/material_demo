@extends('layouts.common')
@section('pageTitle')
    {{__('app.default_edit_title',["app_name" => __('app.app_name'),"module"=> __('app.user')])}}
@endsection
@push('externalCssLoad')
<link rel="stylesheet" href="{{url('css/plugins/jquery.datetimepicker.css')}}" type="text/css" />
@endpush
@push('internalCssLoad')

@endpush
@section('content')
    <div class="be-content">
            <div class="page-head">
            <h2>{{trans('app.user')}} {{trans('app.management')}}</h2>
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">{{trans('app.admin_home')}}</a></li>
                <li><a href="{{url('/user/list')}}">{{trans('app.user')}} {{trans('app.management')}}</a></li>
                <li class="active">{{trans('app.edit')}} {{trans('app.user')}}</li>
            </ol>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">{{trans('app.edit')}} {{trans('app.user')}}</div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{url('/user/update')}}" name="app_edit_form" id="app_form" style="border-radius: 0px;" method="post" class="form-horizontal group-border-dashed">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">First Name <span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control input-sm required" value="{{$details->first_name}}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Last Name <span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control input-sm required" value="{{$details->last_name}}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">{{trans('app.user')}} Role <span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <select class="form-control input-sm required" name="role_id" id="role_id">
                                            <option value="">Select Role</option>
                                            @if(count($roleData) > 0)
                                                @foreach($roleData as $row)
                                                    <option value="{{$row->id}}" @if($details->role_id == $row->id){{"selected"}}@endif>{{$row->code}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email Editress <span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <input type="text" name="email" id="email" placeholder="Email Editress" class="form-control input-sm required email" readonly value="{{$details->email}}" />
                                    </div>
                                </div>
                                <?php
                                    $status_check = "";
                                    if ($details->status == '1') {
                                        $status_check = "checked";
                                    }
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Status<span class="error">*</span></label>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="switch-button switch-button-lg">
                                            <input name="status" id="swt1" {{$status_check}} type="checkbox" value="1" />
                                            <span>
                                                 <label for="swt1"></label>
                                             </span>
                                        </div>
                                    </div>
                                </div>

                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="{{$details->id}}" />
                                <div class="col-sm-6 col-md-8 savebtn">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-info btn-lg">Update {{trans('app.user')}}</button>
                                        <a href="{{url('/user/list')}}" class="btn btn-space btn-danger btn-lg">Cancel</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <div class="col s12 m12 112">
                        <div class="card-panel">
                            <h4 class="header2">USER MANAGMENT</h4>
                            <div class="row">
                                <form action="{{url('/user/store')}}" name="app_add_form" id="app_form" method="post" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="first_name" id="first_name" type="text" value="{{old('first_name')}}" required />
                                            <label for="first_name">First Name</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <input name="last_name" id="last_name" type="text" value="{{old('last_name')}}" required />
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="email" id="email" type="email" autocomplete="off" value="{{old('email')}}" required />
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="password" type="password" name="password" value="{{old('password')}}" required />
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="confirm_password" type="password" name="confirm_password" value="{{old('confirm_password')}}" />
                                            <label for="confirm_password">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <select required name="role_id" id="role_id">
                                                <option value="">{{trans('app.select')}} {{trans('app.role')}}</option>
                                                @if(count($roleData) > 0)
                                                    @foreach($roleData as $row)
                                                        <option value="{{$row->id}}">{{$row->code}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <label>{{trans('app.user')}} {{trans('app.role')}}</label>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <div class="switch">

                                                    <label>
                                                        <input name="status" checked id="swt1" type="checkbox" value="1">
                                                        <span class="lever"></span>
                                                        Status
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">{{trans('app.add')}} {{trans('app.user')}}
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                            <div class="input-field col s6">
                                                <a href="{{url('/user/list')}}" class="btn btn-space btn-lg red darken-4">Cancel</a>
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
<script src="{{url('js/plugins/jquery.datetimepicker.js')}}" type="text/javascript"></script>
<script src="{{url('js/modules/user.js')}}"></script>
@endpush
@push('internalJsLoad')
<script type="text/javascript">
        checkParentValid();
        app.validate.init(app.user.action.event.custome_validations());
        app.user.action.event.common();

</script>
@endpush