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
													<a href="{{ route('admin-generate-backup') }}">{{ __('Generate BackUp') }} </a>
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



												<div style="padding: 10px;" class="text-center">
													@if($bkuplink == "")
														<span id="bkupData">{{ __('No Backup File Generated.') }}</span>
													@else
														<span id="bkupData"><a href="{{$bkuplink}}">{{$chk}}</a><a href="{{route('admin-clear-backup')}}"> <i class="fa fa-times-circle"></i></a></span>
													@endif
												</div>
												<hr/>
												<div class="add-product-footer text-center">
													<button name="addProduct_btn" id="generateBkup" type="button" class="addProductSubmit-btn">{{ __('Generate Backup') }}</button>
												</div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection

@section('scripts')
	<script type="text/javascript">

        $("#generateBkup").click(function(){
            $('#bkupData').html('<img style="height:100px;" src="{{asset("assets/images/".$gs->loader)}}"><br>{{ __('Generating Backup... Please wait....') }}');
            $.ajax({
                url: "{{url('admin/check/movescript')}}",
                success: function(result){
                    if(result.status == 'success'){
                        $("#bkupData").html('<a href="'+result.backupfile+'">'+result.filename+'</a>');
                    }
                }
            });
        });

	</script>

@endsection