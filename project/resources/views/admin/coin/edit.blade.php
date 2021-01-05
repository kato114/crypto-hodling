@extends('layouts.load')
@section('content')

						<div class="content-area">
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">
											@include('includes.admin.form-error') 
											<form id="geniusformdata" action="{{route('admin-coin-update',$data->id)}}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}
						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __("Customer Profile Image") }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <div class="img-upload">
						                            	@if($data->is_provider == 1)
						                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset($data->photo):asset('assets/images/noimage.png') }});">
						                            	@else
						                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/users/'.$data->photo):asset('assets/images/noimage.png') }});">
						                                @endif
						                                @if($data->is_provider != 1)
						                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __("Upload Image") }}</label>
						                                    <input type="file" name="photo" class="img-upload" id="image-upload">
						                                @endif
						                                  </div>
						                                  <p class="text">{{ __("Prefered Size: (600x600) or Square Sized Image") }}</p>
						                            </div>
						                          </div>
						                        </div>
						                        
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Short Term') }} *</h4>
																<p class="sub-heading">{{ __('(In Any Language)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="sterm" placeholder="{{ __('Short term : BTC') }}" required="" value="{{$data->sterm}}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Long Term') }} *</h4>
																<p class="sub-heading">{{ __('(In Any English)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="lterm" placeholder="{{ __('Long term : Bitcoin') }}" required="" value="{{$data->lterm}}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Discription') }} *</h4>
																<p class="sub-heading">{{ __('(In Any English)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="bio" placeholder="{{ __('Description : Digital Gold') }}" required="" value="{{$data->bio}}">
													</div>
												</div>
												
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															
														</div>
													</div>
													<div class="col-lg-7">
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