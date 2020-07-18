<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="GeniusOcean">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{$gs->title}}</title>
    <!-- favicon -->
    <link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('assets/vendor/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/fontawesome.css')}}">
    <!-- icofont -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/icofont.min.css')}}">
    <!-- Sidemenu Css -->
    <link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/vendor/css/plugin.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/vendor/css/jquery.tagit.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap-coloroicker.css') }}">
    <!-- Main Css -->

    @if($langg->rtl == "1")

        <link href="{{asset('assets/admin/css/rtl/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/rtl/custom.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/rtl/responsive.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/common.css')}}" rel="stylesheet" />

    @else

        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/common.css')}}" rel="stylesheet" />

    @endif

    @yield('styles')

</head>
<body>
<div class="page">
    <div class="page-main">
        <!-- Header Menu Area Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <a class="admin-logo" href="{{ route('front.index') }}">
                        <img src="{{asset('assets/images/'.$gs->logo)}}" alt="">
                    </a>
                    <div class="menu-toggle-button">
                        <a class="nav-link" href="javascript:;" id="sidebarCollapse">
                            <div class="my-toggl-icon">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                        </a>
                    </div>

                    <div class="right-eliment">
                        <ul class="list">

                            <li class="bell-area">
                                <a id="notf_order" class="dropdown-toggle-1" href="javascript:;">
                                    <i class="icofont-cart"></i>
                                    <span data-href="{{ route('vendor-order-notf-count',Auth::guard('web')->user()->id) }}" id="order-notf-count">{{ App\Models\UserNotification::countOrder(Auth::guard('web')->user()->id) }}</span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdownmenu-wrapper" data-href="{{ route('vendor-order-notf-show',Auth::guard('web')->user()->id) }}" id="order-notf-show">
                                    </div>
                                </div>
                            </li>

                            <li class="login-profile-area">
                                <a class="dropdown-toggle-1" href="javascript:;">
                                    <div class="user-img">
                                        @if(Auth::user()->is_provider == 1)
                                            <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo):asset('assets/images/noimage.png') }}" alt="">
                                        @else
                                            <img src="{{ Auth::user()->photo ? asset('assets/images/users/'.Auth::user()->photo ):asset('assets/images/noimage.png') }}" alt="">
                                        @endif
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdownmenu-wrapper">
                                        <ul>
                                            <h5>{{ $langg->lang431 }}</h5>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu Area End -->
        <div class="wrapper">
            <!-- Side Menu Area Start -->
            <nav id="sidebar" class="nav-sidebar">
                <ul class="list-unstyled components" id="accordion">

                    <li>
                        <a href="{{route('affiliate-show')}}" class="wave-effect"><i class="fas fa-angle-double-right mr-2"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('affiliate-setting')}}" class="wave-effect"><i class="fas fa-angle-double-right mr-2"></i> Setting</a>
                    </li>
                    <li>
                        <a  href="{{route('affiliate-withdraw-index')}}" class="wave-effect"><i class="fas fa-angle-double-right mr-2"></i> Withdraw</a>
                    </li>
                    <li>
                        <a  href="{{route('user-logout')}}" class="wave-effect"><i class="fas fa-angle-double-right mr-2"></i> Logout</a>
                    </li>
                </ul>
            </nav>
            <!-- Main Content Area Start -->
        @yield('content')
        <!-- Main Content Area End -->
        </div>
    </div>
</div>

<!-- Dashboard Core -->
<script src="{{asset('assets/vendor/js/vendors/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/vendors/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/jqueryui.min.js')}}"></script>
<!-- Fullside-menu Js-->
<script src="{{asset('assets/vendor/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/fullside-menu/waves.min.js')}}"></script>

<script src="{{asset('assets/vendor/js/plugin.js')}}"></script>

<script src="{{asset('assets/vendor/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/tag-it.js')}}"></script>
<script src="{{asset('assets/vendor/js/nicEdit.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{asset('assets/vendor/js/notify.js') }}"></script>
<script src="{{asset('assets/vendor/js/load.js')}}"></script>
<!-- Custom Js-->
<script src="{{asset('assets/vendor/js/custom.js')}}"></script>
@yield('scripts')

@if($gs->is_admin_loader == 0)
    <style>
        div#geniustable_processing {
            display: none !important;
        }
    </style>
@endif

</body>

</html>
