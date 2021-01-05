@extends('layouts.admin') 

@section('content')  
					<input type="hidden" id="headerdata" value="{{ __('CATEGORY') }}">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __('Coins') }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
											</li>
											<li>
												<a href="javascript:;">{{ __('Portfolio') }} </a>
											</li>
											<li>
												<a href="{{ route('admin-coin-index') }}">{{ __('Coins') }}</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">

                        				@include('includes.admin.form-success')  
                        
										<div class="table-responsiv">
												<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
									                        <th>{{ __('ID') }}</th>
									                        <th>{{ __('Symbol') }}</th>
									                        <th>{{ __('Name') }}</th>
									                        <th>{{ __('Price') }}</th>
									                        <th>{{ __('Options') }}</th>
														</tr>
													</thead>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
@endsection    



@section('scripts')

    <script type="text/javascript">

		var table = $('#example').DataTable({
			   	ordering: false,
               	processing: true,
               	serverSide: true,
               	ajax: '{{ route('admin-coin-datatables') }}',
               	columns: [
                        { data: 'image', name: 'image' },
                        { data: 'sterm', name: 'sterm' },
                        { data: 'lterm', name: 'lterm' },
                        { data: 'price', name: 'price' },
                        { data: 'status', searchable: false, orderable: false},
                     ],
               	language: {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                },
				drawCallback : function( settings ) {
	    				$('.select').niceSelect();	
				}
            });

      	$(function() {
        $(".btn-area").append('');
      });												
										
    </script>
@endsection   