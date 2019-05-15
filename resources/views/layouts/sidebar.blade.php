<?php $userPermission = \App\Helpers\LaraHelpers::GetUserPermissions(); ?>
<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="{{url('material/images/avatar.jpg')}}" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="{{url('/user/profile')}}"><i class="mdi-action-face-unlock bold {{$profileTab or ''}}"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                            </li>
                            <li><a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi-hardware-keyboard-tab"></i> {{trans('app.logout')}}</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                            <i class="mdi-navigation-arrow-drop-down right"></i>
                            {{ Auth::user()->name }}

                        </a>
                        <p class="user-roal">{{ Auth::user()->role->role_type }}</p>

                    </div>
                </div>
            </li>
            <li class="bold"><a href="{{url('/')}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            @if(in_array("master_manage",$userPermission))
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold" {{$masterManagementTab or ''}}><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> {{trans('app.master_managemet')}}</a>
                            <div class="collapsible-body">
                                <ul>
                                    @if(in_array("user_management",$userPermission))
                                        <li class="{{$userTab or ''}}">
                                            <a href="{{url('/user/list')}}">{{trans('app.user')}} {{trans('app.management')}}</a>
                                        </li>
                                    @endif
                                    @if(in_array("role_manage",$userPermission))
                                        <li class="{{$roleTab or ''}}">
                                            <a href="{{url('/role/list')}}">{{trans('app.role')}} {{trans('app.management')}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            @endif
            {{--<li class="bold {{$profileTab or ''}}"><a href="{{url('/user/profile')}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> {{trans('app.my_profile')}}</a>--}}
            <li class="bold {{$changePasswordTab or ''}}"><a href="{{url('/change-password')}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> {{trans('app.change_password')}}</a>

    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
@endif

</aside>
<!-- END LEFT SIDEBAR NAV-->