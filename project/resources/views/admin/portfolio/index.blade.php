@extends('layouts.admin') 

@section('content')  
<input type="hidden" id="headerdata" value="{{ __("Portfolio") }}">
<div class="content-area">
	<div class="mr-breadcrumb">
		<div class="row">
			<div class="col-lg-12">
					<h4 class="heading">{{ __("Portfolios") }}</h4>
					<ul class="links">
						<li>
							<a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
						</li>
						<li>
							<a href="{{ route('admin-portfolio-index') }}">{{ __("Portfolios") }}</a>
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
						<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
							<thead>
                                <th>{{ __('Portfolio Name') }}</th>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('Start Balance') }}</th>
                                <th>{{ __('Current Balance') }}</th>
                                <th>{{ __('Period') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th></th>
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
{{-- DATA TABLE --}}
<script type="text/javascript">
	var table = $('#geniustable').DataTable({
	   ordering: false,
       processing: true,
       serverSide: true,
       ajax: '{{ route('admin-portfolio-datatables') }}',
       columns: [
                { data: 'name', name: 'name' },
                { data: 'username', name: 'username' },
                { data: 'sbalance', name: 'sbalance' },
                { data: 'cbalance', name: 'cbalance' },
                { data: 'period', name: 'period' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
    			{ data: 'action', searchable: false, orderable: false }
             ],
       	language : {
        	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
        },
        drawCallback : function( settings ) {
            $('.select').niceSelect();  
        }
    });
</script>
{{-- DATA TABLE --}}
@endsection   