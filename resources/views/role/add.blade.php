@extends('layouts.common')
@section('pageTitle')
    {{__('app.default_add_title',["app_name" => __('app.app_name'),"module"=> __('app.role')])}}
@endsection
@push('externalCssLoad')

@endpush
@push('internalCssLoad')

@endpush
@section('content')
    <section id="content">
        <div class="container">
            <div class="section">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
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
                                <h4>ROLE MANAGMENT</h4>
                                <div class="row">
                                    <form action="{{url('/role/store')}}" name="app_add_form" id="app_form" method="post" class="col s12">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input name="role_type" id="role_type" type="text" value="{{old('role_type')}}" required />
                                                <label for="role_type">{{trans('app.role')}} Type</label>
                                            </div>

                                            <div class="input-field col s6">
                                                <input name="code" id="code" type="text" value="{{old('code')}}" required />
                                                <label for="last_name">Code</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h4 class="header2">ROLES</h4>
                                            <div class="input-field col s6">
                                                <div style="max-height: 140px; overflow-y: scroll;">
                                                    @if(count($permissionData) > 0)
                                                        <input type="checkbox" class="check_all_prms" id="check_all_prms" />&nbsp;&nbsp;&nbsp;<label for="check_all_prms">Select All Permissions</label><br>
                                                        @foreach($permissionData as $row)
                                                            <input type="checkbox" class="permissions" value="{{$row->id}}" name="permission_ids[]" id="permission_id_{{$row->id}}" />&nbsp;&nbsp;&nbsp;<label for="permission_id_{{$row->id}}">{{$row->name}}</label><br>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        {{ csrf_field() }}

                                        <div class="row">
                                                <div class="input-field col s6">
                                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">{{trans('app.add')}} {{trans('app.role')}}
                                                        <i class="mdi-content-send right"></i>
                                                    </button>
                                                </div>
                                                <div class="input-field col s6">
                                                    <a href="{{url('/role/list')}}" class="btn btn-space btn-lg red darken-4">Cancel</a>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

@push('externalJsLoad')
@endpush
@push('internalJsLoad')
<script type="text/javascript">
    $(document).ready(function () {
        app.validate.init();

        $(".check_all_prms").click(function (){
            if($(".check_all_prms:checked").length > '0'){
                $(".permissions").prop('checked',true);
            }else{
                $(".permissions").prop('checked',false);
            }

        });

        $(".permissions").click(function () {
            if($(".permissions").length != $(".permissions:checked").length){
                $(".check_all_prms").prop('checked',false);
            }else{
                $(".check_all_prms").prop('checked',true);
            }
        });

    });
</script>
@endpush