@extends('layouts.admin')
@section('content')

	<div class="content-area">
		<div class="mr-breadcrumb">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="heading">{{ __('System Purchase Activation') }}</h4>
					<ul class="links">
						<li>
							<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
						</li>
						<li>
							<a href="{{ route('admin.profile') }}">{{ __('System Activation') }} </a>
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
							@if($activation_data != "")
								<div class="row">
									<div class="col-lg-12 text-center" style="color:darkgreen">

										{!! $activation_data !!}

									</div>
								</div>
							@else
								<form id="geniusform" action="{{ route('admin-activate-purchase') }}" method="POST">
									{{csrf_field()}}

									@include('includes.admin.form-both')



									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
												<h4 class="heading">{{ __('Purchase Code') }} *</h4>
												<p class="sub-heading"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">{{ __('How to get purchase code?') }}</a></p>
											</div>
										</div>
										<div class="col-lg-7">
											<input class="form-control" name="pcode" id="admin_name" placeholder="{{ __('Enter Purchase Code') }}" required="" value="" type="text">
										</div>
									</div>


									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">

											</div>
										</div>
										<div class="col-lg-7">
											<button class="addProductSubmit-btn" type="submit">{{ __('Activate') }}</button>
										</div>
									</div>

								</form>

							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection