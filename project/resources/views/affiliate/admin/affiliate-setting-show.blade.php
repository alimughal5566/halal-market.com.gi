@extends('layouts.admin')
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Edit Profile') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profile') }}">{{ __('Edit Profile') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">

                            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                            <form id="geniusform" action="{{ route('admin.affiliate_setting') }}" method="POST">
                                {{csrf_field()}}

                                @include('includes.admin.form-both')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">User Commission *</h4>
                                            <p class="sub-heading">In Any Language</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="number" min="0" max="100" class="input-field" name="user_commission" placeholder="user commission" required value="{{$data[0]->commission}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Admin Commission *</h4>
                                            <p class="sub-heading">In Any Language</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="number" min="0" max="100" class="input-field" name="vender_commission" placeholder="admin commission" required value="{{$data[1]->commission}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">Create Page</button>
                                    </div>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection