 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">

            <li class="menu-title">{{__('Pages')}}</li>
            <li class="@if(isset($menu) && $menu=='user') mm-active @endif">
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i style="font-size: 25px;" class="ri-account-circle-line"></i>
                    <span>{{__('Users')}}</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('home')}}"><i style="font-size: 15px;"class="fas fa-user-friends"></i>{{__('All Users')}}</a></li>
                    <!-- <li><a href="{{route('user.register')}}"><i class="fas fa-user-plus"></i> Registration</a></li>  -->
                    <li  class="@if(isset($menu) && $menu=='role') mm-active @endif">
                        <a href="{{route('user.role_Page')}} " class="@if(isset($menu) && $menu=='role') active @endif"> 
                            <i style="font-size: 15px;" class="fa fa-lock"></i> {{__('Role Manager')}}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="@if(isset($menu) && $menu=='car') mm-show @endif">
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i style="font-size: 25px;" class="mdi mdi-car"></i>
                    <span>{{__('Cars')}}</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li  class="@if(isset($menu) && $menu=='car1') mm-active @endif" >
                        <a href="{{route('car.index')}}" class="@if(isset($menu) && $menu=='car1') active @endif">
                        {{__('All Cars')}}
                        </a>
                    </li>
                   
                    <li  class="@if(isset($menu) && $menu=='car2') mm-active @endif">
                        <a href="{{route('car.create')}} " class="@if(isset($menu) && $menu=='car2') active @endif"> 
                          {{__('Add New Car')}}
                        </a>
                    </li>

                    <li  class="@if(isset($menu) && $menu=='attribute') mm-active @endif">
                        <a href="{{route('car.attribute')}} " class="@if(isset($menu) && $menu=='attribute') active @endif"> 
                          {{__('Attributes')}}
                          
                        </a>
                    </li>
                
                </ul>
            </li>

                               
        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->