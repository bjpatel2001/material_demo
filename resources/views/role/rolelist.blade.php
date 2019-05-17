@extends('layouts.common')
@section('pageTitle')
    {{__('app.default_list_title',["app_name" => __('app.app_name'),"module"=> __('app.role')])}}
@endsection
@push('externalCssLoad')

@endpush
@push('internalCssLoad')

@endpush
@section('content')
    <section id="content">
        <?php $baseUrl = App::make('url')->to('/'); ?>
        <div class="container">
            <div class="section">
                <h4>ROLE LIST</h4>

                <table class="striped">
                    <thead>
                    <tr>
                        <th>{{trans('app.role')}} Type</th>
                        <th>{{trans('app.role')}} Code</th>
                        <th>Action</th>

                    </tr>

                    </thead>
                    <tbody>
                    @if(count($roleData) > 0)
                        @foreach($roleData as $row)
                            <tr>
                                <td>{{$row->role_type}}</td>
                                <td>{{$row->code}}</td>
                                <td>
                                    <div class="icon pull-left"><a href="{{$baseUrl.'/role/edit/'.$row->id}}"><span title="Edit" class="mdi-content-create"></span></a></div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No Record Found</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>


@endsection

@push('externalJsLoad')
@endpush
@push('internalJsLoad')

@endpush