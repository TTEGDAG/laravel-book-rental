<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Onlinebooks.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('layouts\css')

</head>
    <body>
    <div id="page-wrapper">

                <!-- Top Bar Start -->
                <div class="topbar" id="topnav">

                    <!-- Top navbar -->
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container">
                            <div class="">

                                <!-- LOGO -->
                                <div class="topbar-left">
                                    <div class="">
                                        <a href="{{ url('/') }}" class="logo">
                                            <img src="{{ asset('images/logo-1.png') }}" alt="logo" class="logo-lg" />
                                            <img src="{{ asset('images/logo-1.png') }}" alt="logo" class="logo-sm hidden" />
                                        </a>
                                    </div>
                                </div>

                                <div class="navbar-custom navbar-left">
                                    <div id="navigation">
                                        <!-- Navigation Menu-->
                                        <ul class="navigation-menu">
                                            <li>
                                                <a href="{{ url('/') }}">
                                                    <span><i class="ti-home"></i></span><span> Książki </span> 
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#"> <span><i class="ti-files"></i></span><span> Kategorie </span> </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <span><i class="ti-cloud-down"></i></span><span> Nowości </span> 
                                                </a>
                                            </li>
                                            @auth
                                                <li class="has-submenu">
                                                    <a href="#"> <span><i class="ti-dashboard"></i></span><span> Moje konto </span> </a>
                                                    <ul class="submenu">
                                                        <li><a href="#"> Moje książki</a></li>
                                                        <li><a href="#"> Profil</a></li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('logout')}}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    {{ __('Logout') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>                                
                                                        </li>
                                                    </ul>
                                                </li>
                                            
                                                @if(Auth::user()->role_id == 1)
                                                <li>
                                                    <a href="#">
                                                        <span><i class="ti-settings"></i></span><span> Admin </span> 
                                                    </a>
                                                </li>
                                                @endif
                                            @endauth
                                        </ul>
                                        <!-- End navigation menu  -->
                                    </div>
                                </div>
                                

                                <!-- Top nav Right menu -->
                                <ul class="nav navbar-nav top-navbar-items pull-right">
                                    
                                    <li class="top-menu-item-xs">
                                        <!-- Mobile menu toggle-->
                                        <a class="navbar-toggle">
                                            <div class="lines">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </a>
                                        <!-- End mobile menu toggle-->
                                    </li>

                                    <li class="hidden-xs">
                                        <form method="get" action="{{ route('search') }}" role="search" class="navbar-left app-search pull-left">
                                            <input type="text" name="name" placeholder="Szukaj..." class="form-control">
                                            <button type="submit" style="display: inherit;border: none;background: transparent;margin-top: -30px;margin-left: 150px;color: #fff;"><i class="fa fa-search"></i></button>
                                            @csrf
                                        </form>
                                    </li>
                                    @guest
                                        <li class="hidden-sm hidden-xs">
                                            <a href="{{ route('login') }}">
                                                <span><i class="ti-unlock"></i></span><span> {{ __('Login') }} </span> 
                                            </a>
                                        </li>
                                    @if (Route::has('register'))
                                        <li class="hidden-sm hidden-xs">
                                            <a href=" route('register') ">
                                                <span><i class="ti-user"></i></span><span> {{ __('Register') }} </span> 
                                            </a>
                                        </li>
                                    @endif
                                    @endguest
                                </ul>
                            </div>
                        </div> <!-- end container -->
                    </div> <!-- end navbar -->
                </div>
                <!-- Top Bar End -->


                <!-- Page content start -->
                <div class="page-contentbar">

                    <!-- START PAGE CONTENT -->
                    <div id="page-right-content">

                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @if (session('status'))
                                    <div class="alert alert-{{ session('status')['type'] }} alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h5>{{ session('status')['content'] }}</h5>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @yield('content')
                    
                        <div class="footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="pull-right hidden-xs">
                                            Created by <strong class="text-custom">onlinebooks</strong>.
                                        </div>
                                        <div>
                                            <strong>onlinebooks</strong> - Copyright &copy; 2020
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end footer -->

                    </div>
                    <!-- End #page-right-content -->

                    <div class="clearfix"></div>

                </div>
                <!-- end .page-contentbar -->

                

            </div>
            <!-- End #page-wrapper -->

            @include('layouts\js')
    </body>
</html>
