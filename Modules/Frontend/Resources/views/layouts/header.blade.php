<!doctype html>
<html lang="en">

    <head>
        
        <!-- <meta charset="utf-8" />
        <title>Kanban Board | Nazox - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" /> -->
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <!-- dragula css -->
        <!-- <link href="assets/libs/dragula/dragula.min.css" rel="stylesheet" type="text/css" /> -->


    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header" style="margin-top:-20px;">
                    <div class="d-flex"style="margin-top:10px;">
                    
                    <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
 <!-- LOGO -->
    <div >
        <!-- <a href="{{route('home')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/d.GIF')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/d.GIF')}}" alt="" height="20">
            </span>
        </a> -->

        <a href="{{route('home')}}" class="logo logo-light">
            <span class="logo-sm" style="margin-left: 15px;margin-top:7px;">
                <img src="{{asset('assets/images/2Z.GIF')}}" alt="" height="35">
            </span>
            <span class="logo-lg ml-4">
                <img src="{{asset('assets/images/2Z.GIF')}}" style="margin-top:7px;margin-right:80px;"alt="" height="43">
            </span>
        </a>
    </div>
                        
                        <!-- social medai -->
                        <div class="d-none d-lg-block">
                            <div class="position-relative" style="font-size: 20px; margin-top:24px;">     
                           <a href="{{route('home')}}" style="color: white;"> <i class="mdi mdi-linkedin mr-4"></i></a>
                           <a href="{{route('home')}}"style="color: white;"> <i class="ri-twitter-fill mr-4"></i></a>
                            <a href="{{route('home')}}"style="color: white;"><i class="fab fa-google-plus-g mr-4"></i></a>
                            </div>
                       </div>
                    </div>

                    <div class="d-flex"style="margin-top:20px;">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="{{asset('assets/images/flags/us.jpg')}}" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('assets/images/flags/french.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">french</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('assets/images/flags/us.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English</span>
                                </a>

                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="px-lg-2">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('assets/images/brands/github.png')}}" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('assets/images/brands/bitbucket.png')}}" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                         <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('assets/images/brands/dribbble.png')}}" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- full screen -->
                            <div class="dropdown d-none d-lg-inline-block ml-1">
                                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                        <i class="ri-fullscreen-line"></i>
                                    </button>
                                </div>
    

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-2.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1">Kevin</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                <a class="dropdown-item" href=""><i class="ri-user-line align-middle mr-1"></i> {{__('Profile')}}</a>
                                <a class="dropdown-item changeP" data-toggle="modal" data-target="#log1" data-id=''><i class="fa fa-lock"></i> {{__('Change Password')}}</a>
                                <!-- <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right mt-1">11</span><i class="ri-settings-2-line align-middle mr-1"></i> Settings</a> -->
                                <!-- <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i> Lock screen</a> -->
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>
                                        {{__('Logout')}}
                                </a> -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                
                            </div>
                        </div>
                          
                            <!-- setting
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                    <i class="ri-settings-2-line"></i>
                                </button>
                            </div> -->
                
                    </div>
                </div>
            </header>
        <div style="margin-top:-31px;">
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse" id="topnav-menu-content"style="margin-top:8px;">
                                <ul class="navbar-nav">

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('frontend.home1')}}">
                                            <i class="ri-dashboard-line mr-2"></i> Home
                                        </a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">
                                        <i class="fas fa-car"></i> Cars
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                        <i class="ri-menu-fill"></i> Detais
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">
                                        <i class="ri-file-copy-2-line"></i> About Us
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">
                                        <i class="ri-contacts-line"></i> Contact Us
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
 <!--end div--> </div>
        </div>
    </body>
</html>