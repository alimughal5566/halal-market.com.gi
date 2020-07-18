@extends('layouts.admin')

@section('content')
            <div class="content-area">

              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Affiliate Registration') }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("Back") }}</a></h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('Affiliate User') }} </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-affiliation-index') }}">{{ __('All Affiliate User') }}</a>
                        </li>
                        <li>
                          <a href="{{ route('admin-affiliation-create') }}">{{ __('Setting') }}</a>
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

                        @include('includes.admin.form-both')
                        @if(session()->has('success'))
                          <div class="alert alert-success validation">
                            <button type="button" class="close alert-close"><span>×</span></button>
                            <p class="text-left">Your Record Updated Successfully</p>
                          </div>
                        @endif
                        @if ($errors->any())
                          <div class="alert alert-danger validation">
                            <button type="button" class="close alert-close"><span>×</span></button>
                            <p class="text-left">{{$errors->first()}}</p>
                          </div>
                        @endif

                      <form id="" action="{{route('admin-affiliation-setting.update')}}" method="POST" enctype="multipart/form-data">

                        {{csrf_field()}}




                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Commision %') }} *</h4>
                                <p class="sub-heading">{{ __('User commission') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="user_commission" placeholder="{{ __('commision') }}" required="" value="{{ $settings->where('type','user_commission')->first()->commission }}">
                          </div>

                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">{{ __('Commision %') }} *</h4>
                              <p class="sub-heading">{{ __('Vender commission') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="vender_commission" placeholder="{{ __('commision') }}" required="" value="{{ $settings->where('type','vender_commission')->first()->commission }}">
                          </div>

                        </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Update Commission') }}</button>
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

@section('scripts')
<script type="text/javascript">
</script>
@endsection 