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
                        @include('includes.admin.form-success')  

                      <form id="" action="{{route('admin-affiliation-setting.update')}}" method="POST" enctype="multipart/form-data">

                        {{csrf_field()}}




                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Commision %') }} *</h4>
                                <p class="sub-heading">{{ __('In Any Language') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="commision" placeholder="{{ __('commision') }}" required="" value="{{ Request::old('commision', $setting->commision) }}">
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Create Page') }}</button>
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