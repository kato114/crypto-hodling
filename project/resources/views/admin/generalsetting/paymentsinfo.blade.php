@extends('layouts.admin')


@section('styles')

<style type="text/css">
.img-upload #image-preview {
  background-size: unset !important;
  }
</style>

@endsection

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Payment Informations') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('Payment Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-payments') }}">{{ __('Payment Informations') }}</a>
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
                        <form action="{{ route('admin-gs-update-payment') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Stripe') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->stripe_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-stripe',1)}}" {{ $gs->stripe_check == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-stripe',0)}}" {{ $gs->stripe_check == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Stripe Key') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Stripe Key') }}" name="stripe_key" value="{{ $gs->stripe_key }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Stripe Secret') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Stripe Secret') }}" name="stripe_secret" value="{{ $gs->stripe_secret }}" required="">
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Stripe Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="stripe_text" placeholder="{{ __('Stripe Text') }}">{{ $gs->stripe_text }}</textarea>

                          </div>
                        </div>


<hr>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Paypal') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->paypal_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-paypal',1)}}" {{ $gs->paypal_check == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-paypal',0)}}" {{ $gs->paypal_check == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paypal Email') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Paypal Email') }}" name="paypal_business" value="{{ $gs->paypal_business }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paypal Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="paypal_text" placeholder="{{ __('Paypal Text') }}">{{ $gs->paypal_text }}</textarea>

                          </div>
                        </div>



<hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Instamojo') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_instamojo == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-instamojo',1)}}" {{ $gs->is_instamojo == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-instamojo',0)}}" {{ $gs->is_instamojo == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Instamojo API Key ') }}*
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Instamojo API Key') }}" name="instamojo_key" value="{{ $gs->instamojo_key }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Instamojo Auth Token') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Instamojo Auth Token') }}" name="instamojo_token" value="{{ $gs->instamojo_token }}" required="">
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Instamojo Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="instamojo_text" placeholder="{{ __('Instamojo Text') }}">{{ $gs->instamojo_text }}</textarea>

                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Instamojo Sandbox Check') }} *
                                  </h4>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <label class="switch">
                              <input type="checkbox" name="instamojo_sandbox" value="1" {{ $gs->instamojo_sandbox == 1 ? "checked":"" }}>
                              <span class="slider round"></span>
                            </label>
                          </div>
                          </div>


<hr>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Paystack') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_paystack == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-paystack',1)}}" {{ $gs->is_paystack == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-paystack',0)}}" {{ $gs->is_paystack == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paystack Public Key') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Paystack Public Key') }}" name="paystack_key" value="{{ $gs->paystack_key }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paystack Business Email') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Paystack Business Email') }}" name="paystack_email" value="{{ $gs->paystack_email }}" required="">
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paystack Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="paystack_text" placeholder="{{ __('Paystack Text') }}">{{ $gs->paystack_text }}</textarea>

                          </div>
                        </div>


                        <hr>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Paytm') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_paytm == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-paytm',1)}}" {{ $gs->is_paytm == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-paytm',0)}}" {{ $gs->is_paytm == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                          <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('Paytm Merchant') }} *
                                    </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <input type="text" class="input-field" placeholder="{{ __('Paytm Merchant') }}" name="paytm_merchant" value="{{ $gs->paytm_merchant }}" required="">
                            </div>
                          </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paytm Secret') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Paytm Secret') }}" name="paytm_secret" value="{{ $gs->paytm_secret }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paytm Website') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Paytm Website') }}" name="paytm_website" value="{{ $gs->paytm_website }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paytm Industry') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Paytm Industry') }}" name="paytm_industry" value="{{ $gs->paytm_industry }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paytm Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="paytm_text" placeholder="{{ __('Paytm Text') }}">{{ $gs->paytm_text }}</textarea>

                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Paytm Sandbox Check') }} *
                                  </h4>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <label class="switch">
                              <input type="checkbox" name="paytm_mode" value="1" {{ $gs->paytm_mode == 'sandbox' ? "checked":"" }}>
                              <span class="slider round"></span>
                            </label>
                          </div>
                          </div>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Molly Payment') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_molly == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-molly',1)}}" {{ $gs->is_molly == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-molly',0)}}" {{ $gs->is_molly == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Molly Key') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="molly_key" placeholder="{{ __('Molly Key') }}" required>{{ $gs->molly_key }}</textarea>

                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Molly Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="molly_text" placeholder="{{ __('Molly Text') }}" required>{{ $gs->molly_text }}</textarea>

                          </div>
                        </div>

<hr>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Razorpay') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_razorpay == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-razor',1)}}" {{ $gs->is_razorpay == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-razor',0)}}" {{ $gs->is_razorpay == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>




                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Razorpay Key') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="razorpay_key" placeholder="{{ __('Razorpay Key') }}" required>{{ $gs->razorpay_key }}</textarea>

                          </div>
                        </div>



                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Razorpay Secret') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="razorpay_secret" placeholder="{{ __('Razorpay Key') }}" required>{{ $gs->razorpay_secret }}</textarea>

                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Razorpay Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="razorpay_text" placeholder="{{ __('Razorpay Text') }}" required>{{ $gs->razorpay_text }}</textarea>

                          </div>
                        </div>


<hr>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Guest Checkout') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->guest_checkout == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-guest',1)}}" {{ $gs->guest_checkout == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-guest',0)}}" {{ $gs->guest_checkout == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Cash On Delivery') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->cod_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-cod',1)}}" {{ $gs->cod_check == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-cod',0)}}" {{ $gs->cod_check == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Cash On Delivery Text') }} *</h4>

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <textarea class="input-field" name="cod_text" placeholder="{{ __('Cash On Delivery Text') }}">{{ $gs->cod_text }}</textarea>

                          </div>
                        </div>
<hr>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Currency Format') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <select name="currency_format" required="">
                                  <option value="0" {{ $gs->currency_format == 0 ? 'selected' : '' }}>{{__('Before Price')}}</option>
                                  <option value="1" {{ $gs->currency_format == 1 ? 'selected' : '' }}>{{ __('After Price') }}</option>
                              </select>
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Withdraw Fee') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Withdraw Fee') }}" name="withdraw_fee" value="{{ $gs->withdraw_fee }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Withdraw Charge(%)') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Withdraw Charge(%)') }}" name="withdraw_charge" value="{{ $gs->withdraw_charge }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Tax(%)') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Tax(%)') }}" name="tax" value="{{ $gs->tax }}" required="">
                          </div>
                        </div>

                      <hr>

                        <h4 class="text-center">{{ __('Vendor') }}</h4>

                      <hr>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Fixed Commission') }} *
                                  </h4>
                                  <p class="sub-heading">{{ __('Fixed Commission Charge(Product Price + Commission)') }}</p>
                                  <p class="sub-heading">{{ __("(If you don't want to add any fixed commission, just set it to 0)") }}</p>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Fixed Commission') }}" name="fixed_commission" value="{{ $gs->fixed_commission * $curr->value }}" required="">
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Percentage Commission(%)') }} *
                                  </h4>
                                  <p class="sub-heading">{{ __('Percentage Commission Charge(Product Price + Commission(%))') }}</p>
                                  <p class="sub-heading">{{ __("(If you don't want to add any percentage commission, just set it to 0)") }}</p>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Percentage Commission') }}" name="percentage_commission" value="{{ $gs->percentage_commission }}" required="">
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Shipping Information For Vendor') }} *
                                  </h4>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <label class="switch">
                              <input type="checkbox" name="vendor_ship_info" value="1" {{ $gs->vendor_ship_info == 1 ? "checked" : "" }}>
                              <span class="slider round"></span>
                            </label>
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
