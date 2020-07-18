@extends('layouts.load')

@section('content')

<div class="content-area">
    <div class="add-product-content1">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <form id="geniusform" action="{{route('admin-video-store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @include('includes.admin.form-both') 

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __("Embed Code") }} *</h4>
                                        <p class="sub-heading">{{ __("(Youtube URL Watch Code)") }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="input-field" name="code" placeholder="{{ __('code') }}" required="" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <button class="addProductSubmit-btn" type="submit">{{ __('Add Video') }}</button>
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