<div class="icon pull-left">
    <a href="{{url('/'.$module.'/edit/'.$id)}}">
        <i class="mdi-content-create"></i>
    </a>
</div>
@if(Auth::user()->role_id == "1" && $type != "1")
<div class="icon pull-left">
    <a href="javascript:void(0);" class="deleteRecord" formaction="{{$module}}" rel="{{$id}}">
        <i class="mdi-action-delete"></i>
    </a>
</div>
@endif
