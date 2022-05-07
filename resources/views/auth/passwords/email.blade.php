<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Reset Password |  My car </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
                 <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body class="auth-body-bg">
                                    <div class="home-btn d-none d-sm-block">
                                    <a href="{{route('home')}}"><i class="mdi mdi-home-variant h2 text-white"></i></a>
                                    </div>
                <div>
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">


                                <div class="col-lg-4">
                                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                                        <div class="w-100">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-9">
                                                    <div>
                                                            <div class="text-center">
                                                            <br/>
                                                                <div>
                                                                    <a href="{{route('home')}}" class="logo"><img src="{{asset('assets/images/d.GIF')}}" height="40" alt="logo"></a>
                                                                </div>

                                                                <h4 class="font-size-18 mt-4">Reset Password</h4>
                                                                <p class="text-muted">Reset your password to My car .</p>
                                                            </div>



                                                    <div class="p-2 mt-5">
                                                                            @if (session('status'))
                                                                            <div class="alert alert-success" role="alert">
                                                                                {{ session('status') }}
                                                                            </div>
                                                                        @endif

                                                                        <form method="POST" action="{{ route('password.email') }}">
                                                                            @csrf
                                                            <!-- <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                                                                                <div class="form-group auth-form-group-custom mb-4">
                                                                                    <i class="ri-mail-line auti-custom-input-icon"></i>
                                                                                    <label for="useremail">Email</label>

                                                                                    <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
                                                                                    @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror

                                                                                </div>

                                                                                <div class="mt-4 text-center">
                                                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                                                                </div>
                                                                        </form>

                                                    </div>
                                                    
                                                        

                                                        <div class="mt-5 text-center">
                                                            <p>Don't have an account ? <a href="{{ route('login') }}" class="font-weight-medium text-primary"> Login</a> </p>
                                                            <p>Â© 2021 My car. Crafted with <i class="mdi mdi-heart text-danger"></i>by abdessamad zebbara</p>
                                                        </div>

                                            
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                
                                <div class="col-lg-8">
                                    <div class="authentication-bg">
                                        <div class="bg-overlay"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            




        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>

