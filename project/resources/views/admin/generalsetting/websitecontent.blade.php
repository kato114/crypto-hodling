@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Website Contents') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('General Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-contents') }}">{{ __('Website Contents') }}</a>
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
                        <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')



                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Website Title') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Write Your Site Title Here') }}" name="title" value="{{ $gs->title }}" required="">
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Whole Sale Max Quantity') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="number" class="input-field" placeholder="{{ __('Whole Sale Max Quantity') }}" name="wholesell" value="{{ $gs->wholesell }}" required="" min="0">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Theme Color') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                <div class="input-group colorpicker-component cp">
                                <input type="text" class="input-field color-field" name="colors" value="{{ $gs->colors }}"  class="form-control cp"  />
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                              </div>

                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Footer Color') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                <div class="input-group colorpicker-component cp">
                                  <input type="text" class="input-field color-field" name="footer_color" value="{{ $gs->footer_color }}"  class="form-control cp"  />
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                              </div>

                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Copyright Color') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                <div class="input-group colorpicker-component cp">
                                  <input class="input-field color-field" type="text" name="copyright_color" value="{{ $gs->copyright_color }}"  class="form-control cp"  />
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                              </div>

                          </div>
                        </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Use HTTPS') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_secure == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-secure',1)}}" {{ $gs->is_secure == 1 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-secure',0)}}" {{ $gs->is_secure == 0 ? 'selected' : '' }}>{{ __('No') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Home Link On Menu') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_home== 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-ishome',1)}}" {{ $gs->is_home == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-ishome',0)}}" {{ $gs->is_home == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                   {{ __('Capcha') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_capcha== 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-iscapcha',1)}}" {{ $gs->is_capcha == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-iscapcha',0)}}" {{ $gs->is_capcha == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>



                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Sign Up Verification') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_verification_email == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-is-email-verify',1)}}" {{ $gs->is_verification_email == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-is-email-verify',0)}}" {{ $gs->is_verification_email == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Display Stock Number') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->show_stock == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-stock',1)}}" {{ $gs->show_stock == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-stock',0)}}" {{ $gs->show_stock == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Tawk.to') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_talkto == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-talkto',1)}}" {{ $gs->is_talkto == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-talkto',0)}}" {{ $gs->is_talkto == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Tawk.to Widget Code') }} *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <textarea  name="talkto">{{$gs->talkto}}</textarea>
                                  </div>
                              </div>
                            </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Disqus') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_disqus == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-isdisqus',1)}}" {{ $gs->is_disqus == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-isdisqus',0)}}" {{ $gs->is_disqus == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Disqus Universal Code') }} *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <textarea  name="disqus">{{$gs->disqus}}</textarea>
                                  </div>
                              </div>
                            </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Cronjob URL') }} *
                                  </h4>
                                  <p class="sub-heading">{{ __('(Copy This URL and paste this to cron job.)') }} <a target="_blank" href="https://www.youtube.com/watch?v=Hw0fbM7E80Q">{{ __('Check Tutorial') }}</a> </p>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div >
                                  <textarea class="input-field"  readonly="">{{ url('/vendor/subscription/check') }}</textarea>
                                  </div>
                              </div>
                            </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
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
