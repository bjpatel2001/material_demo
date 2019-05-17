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
                            <h4>USER MANAGMENT</h4>
                            <div class="row">
                                <form action="{{url('/user/update')}}" name="app_add_form" id="app_form" method="post" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="first_name" id="first_name" type="text" value="{{$details->first_name}}" required />
                                            <label for="first_name">First Name</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <input name="last_name" id="last_name" type="text" value="{{$details->last_name}}" required />
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="email" id="email" type="email" autocomplete="off" value="{{$details->email}}" required />
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <select name="role_id" id="role_id" required>
                                                <option value="">Select Role</option>
                                                @if(count($roleData) > 0)
                                                    @foreach($roleData as $row)
                                                        <option value="{{$row->id}}" @if($details->role_id == $row->id){{"selected"}}@endif>{{$row->code}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <label>{{trans('app.user')}} {{trans('app.role')}}</label>
                                        </div>
                                        <?php
                                        $status_check = "";
                                        if ($details->status == '1') {
                                            $status_check = "checked";
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <div class="switch">

                                                    <label>
                                                        <input name="status" {{$status_check}} id="swt1" type="checkbox" value="1">
                                                        <span class="lever"></span>
                                                        Status
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="{{$details->id}}" />
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update {{trans('app.user')}}
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