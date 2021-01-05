@extends('layouts.load')
@section('content')

						<div class="content-area">

							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">
											@include('includes.admin.form-error') 
											<form id="geniusformdata" action="{{route('admin-coin-create')}}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Short Term') }} *</h4>
																<p class="sub-heading">{{ __('(In Any Language)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="sterm" placeholder="{{ __('Short term : BTC') }}" required="" value="">
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
														<input type="text" class="input-field" name="lterm" placeholder="{{ __('Long term : Bitcoin') }}" required="" value="">
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
														<input type="text" class="input-field" name="bio" placeholder="{{ __('Description : Digital Gold') }}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															
														</div>
													</div>
													<div class="col-lg-7">
														<button class="addProductSubmit-btn" type="submit">{{ __('Create Coin') }}</button>
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