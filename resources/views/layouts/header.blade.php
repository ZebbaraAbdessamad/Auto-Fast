
<div id="layout-wrapper">
    <header id="page-topbar">
            <div class="navbar-header ">
                                       <div class="d-flex">
                                                            <!-- LOGO -->
                                                            <div class="navbar-brand-box">
                                                                <a href="{{route('home')}}" class="logo logo-dark">
                                                                    <span class="logo-sm">
                                                                        <img src="{{asset('assets/images/d.GIF')}}" alt="" height="22">
                                                                    </span>
                                                                    <span class="logo-lg">
                                                                        <img src="{{asset('assets/images/d.GIF')}}" alt="" height="20">
                                                                    </span>
                                                                </a>

                                                                <a href="{{route('home')}}" class="logo logo-light">
                                                                    <span class="logo-sm" style="margin-left: -15px;">
                                                                        <img src="{{asset('assets/images/2Z.GIF')}}" alt="" height="22">
                                                                    </span>
                                                                    <span class="logo-lg ml-4">
                                                                        <img src="{{asset('assets/images/2Z.GIF')}}" alt="" height="50">
                                                                    </span>
                                                                </a>
                                                            </div>

                                                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                                                    <i class="ri-menu-2-line align-middle"></i>
                                                </button>

                                                   <!-- full screen -->
                                                        <div class="dropdown d-none d-lg-inline-block ml-1">
                                                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                                                <i class="ri-fullscreen-line"></i>
                                                            </button>
                                                        </div>
                                                  
                                                    <!-- languages -->
                                                    <div class="dropdown d-none d-sm-inline-block">
                                                            <button type="button" class="btn header-item waves-effect"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                @if ( Config::get('app.locale') == 'en')
                                                                <img class="" src="{{asset('assets/images/flags/us.jpg')}}" alt="Header Language" height="16">
                                                                @elseif ( Config::get('app.locale') == 'fr' )
                                                               <img src="{{asset('assets/images/flags/french.jpg')}}" alt="user-image" class="mr-1" height="16">
                                                                @else
                                                                <img class="" src="{{asset('assets/images/flags/us.jpg')}}" alt="Header Language" height="16">
                                                               @endif
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                    
                                                           
                                                                <!-- item-->
                                                                <a href="{{route('language','en')}}" class="dropdown-item notify-item">
                                                                    <img src="{{asset('assets/images/flags/us.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">english</span>
                                                                </a>
                                                         
                                                                <!-- item-->
                                                                <a href="{{ route('language', 'fr')}}" class="dropdown-item notify-item">
                                                                    <img src="{{asset('assets/images/flags/french.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">french</span>
                                                                </a>
                                                                
                                                               
                                                            </div>

                                                                     
                                                    </div>
    
                                        </div>
                                                                       

                                                        


                                                    <div class="dropdown d-inline-block user-dropdown " >
                                                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <img class="rounded-circle header-profile-user" src="@if(isset(Auth::user()->image)) {{asset('images/User/'.Auth::user()->image)}} @else {{asset('images/avatar.png')}} @endif " alt="img prf">
                                                                <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name}} {{ Auth::user()->last_name}}</span>
                                                            
                                                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                                <!-- item-->
                                                                                <a class="dropdown-item" href="{{route('user.profile')}}"><i class="ri-user-line align-middle mr-1"></i> {{__('Profile')}}</a>
                                                                                <a class="dropdown-item changeP" data-toggle="modal" data-target="#log1" data-id='{{ Auth::user()->id }}'><i class="fa fa-lock"></i> {{__('Change Password')}}</a>
                                                                                <!-- <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right mt-1">11</span><i class="ri-settings-2-line align-middle mr-1"></i> Settings</a> -->
                                                                                <!-- <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i> Lock screen</a> -->
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                                                        <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>
                                                                                        {{__('Logout')}}
                                                                                </a>
                                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                    {{ csrf_field() }}
                                                                                </form>
                                                                                
                                                                            </div>
                                                     </div>                                          
            </div>
    </header>
</div>





<!--panel change password -->
<div class="modal" id="log1">
            <div class="col-md-5 container my-5 ">
                <div class="card" style=" width:auto; height:auto;  ">
                    <div class="card-body" style="height:auto; padding-left:20px;">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                            <div class="panel-body" style="padding: 10px;">
                                <form id="formP2" action="javascript:void(0)">
                                <div class="success2 mt-1"></div>

                                    @csrf
                                
                                    <div class="form-group">
                                        <label>{{__('New Password')}}</label>
                                        <input type="password" value="" placeholder="{{__('New Password')}}" name="password" class="form-control password">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>{{__('Password Confirmation')}}</label>
                                        <input type="password" value="" placeholder="{{__('Password confirme')}}" name="password_confirmation" class="form-control myInput">
                                        <br />
                                        <!-- An element to toggle between password visibility -->
                                        <input type="checkbox" class="clk"> {{__('Show Password')}}

                                    </div>
                                    <button type="submit" class="btn btn-primary" id="change2"> <i class="fa fa-save"></i> {{__('Change Password')}} </button>
                                    <div class="error2 mt-3"></div>
                                </form>
                            </div>
                    
                    </div>
                </div>
        </div>
 </div>
