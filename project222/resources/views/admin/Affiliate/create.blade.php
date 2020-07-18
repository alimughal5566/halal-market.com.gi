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
                          <a href="javascript:;">{{ __('Affiliations Registration') }} </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-affiliation-index') }}">{{ __('All Affiliations') }}</a>
                        </li>
                        <li>
                          <a href="{{ route('admin-affiliation-create') }}">{{ __('Add') }}</a>
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

                      <form id="" action="{{route('admin-affiliation-store')}}" method="POST" enctype="multipart/form-data">

                        {{csrf_field()}}


                        {{-- <div class="row">
													<div class="col-lg-4">
														<div class="left-area">
														</div>
													</div>
													<div class="col-lg-7">
                            <div class="checkbox-wrapper">
                              <input type="checkbox" name="namesfields" value="1" class="checkclick"
                                id="namesfields" value="1">
                              <label for="namesfields">{{ __('First Name Last Name Fields') }}</label>
                            </div>
                          </div>
								      	</div>
		
		
		
                        <div class="showbox">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('First Name') }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="first_name" placeholder="{{ __('First Name') }}" value="{{ Request::old('first_name') }}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('Last Name') }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ Request::old('last_name') }}">
                            </div>
                          </div>
                        </div> --}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Username') }} *</h4>
                                <p class="sub-heading">{{ __('In Any Language') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="username" placeholder="{{ __('Username') }}" required="" value="{{ Request::old('username') }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Email') }} *</h4>
                                <!-- <p class="sub-heading">{{ __('(In English)') }}</p> -->
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="email" placeholder="{{ __('Email') }}" required="" value="{{ Request::old('email') }}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Password') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="password" class="input-field" name="password" placeholder="{{ __('Password') }}" required="" value="{{ Request::old('password') }}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Confirm Password') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="password" class="input-field" name="confirm_password" placeholder="{{ __('Confirm Password') }}" required="" value="{{ Request::old('confirm_password') }}">
                          </div>
                        </div>

                        {{-- <div class="row">
													<div class="col-lg-4">
														<div class="left-area">
														</div>
													</div>
													<div class="col-lg-7">
							              <div class="checkbox-wrapper">
							                <input type="checkbox" name="terms" class="" required id="terms" value="1">
							                <label for="terms">{{ __('Terms and Conditions') }}</label>
							              </div>
													</div>
												</div> --}}


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