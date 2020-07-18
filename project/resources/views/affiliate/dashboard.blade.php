@extends('layouts.affiliate')

@section('content')
    <input type="hidden" id="headerdata" value="{{ __("VENDOR") }}">
    <div class="content-area">
        <div class="mr-breadcrumb">
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <h4 class="heading">{{ __("Vendors") }}</h4>--}}
{{--                    <ul class="links">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:;">{{ __("Vendors") }}</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('admin-vendor-index') }}">{{ __("Vendors List") }}</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Affiliate Dashboard</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __("Affiliate") }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                <div class="row row-cards-one">
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="mycard bg1">
                            <div class="left">
                                <h5 class="title">Current Balance! </h5>
                                <span class="number">{{\App\MOdels\AffiliateUserCommission::where('user_id',auth()->guard('web')->user()->id)->where('status','pending')->orWhere('status','release')->get()->sum('commission')}}$</span>
{{--                                <a href="//localhost/ploto/admin/orders/pending" class="link">View All</a>--}}
                            </div>
                            <div class="right d-flex align-self-center">
                                <div class="icon">
                                    <i class="icofont-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="mycard bg2">
                            <div class="left">
                                <h5 class="title">Total Commission!</h5>
                                <span class="number">{{\App\MOdels\AffiliateUserCommission::where('user_id',auth()->guard('web')->user()->id)->get()->count()}}</span>
{{--                                <a href="//localhost/ploto/admin/orders/processing" class="link">View All</a>--}}
                            </div>
                            <div class="right d-flex align-self-center">
                                <div class="icon">
                                    <i class="icofont-truck-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="mycard bg3">
                            <div class="left">
                                <h5 class="title">Paid Commission!</h5>
                                <span class="number">{{\App\MOdels\AffiliateUserCommission::where('user_id',auth()->guard('web')->user()->id)->where('status','receive')->get()->count()}}</span>
{{--                                <a href="//localhost/ploto/admin/orders/completed" class="link">View All</a>--}}
                            </div>
                            <div class="right d-flex align-self-center">
                                <div class="icon">
                                    <i class="icofont-check-circled"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="mycard bg4">
                            <div class="left">
                                <h5 class="title">no of vendors!</h5>
                                <span class="number">{{\App\MOdels\AffiliateUserCommission::where('user_id',auth()->guard('web')->user()->id)->where('type','vender')->get()->count()}}</span>
{{--                                <a href="//localhost/ploto/admin/products" class="link">View All</a>--}}
                            </div>
                            <div class="right d-flex align-self-center">
                                <div class="icon">
                                    <i class="icofont-cart-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="mycard bg5">
                            <div class="left">
                                <h5 class="title">no of users!</h5>
                                <span class="number">{{\App\MOdels\AffiliateUserCommission::where('user_id',auth()->guard('web')->user()->id)->where('type','user')->get()->count()}}</span>
{{--                                <a href="//localhost/ploto/admin/users" class="link">View All</a>--}}
                            </div>
                            <div class="right d-flex align-self-center">
                                <div class="icon">
                                    <i class="icofont-users-alt-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>



@endsection