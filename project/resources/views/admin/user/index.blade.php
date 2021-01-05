@extends('layouts.admin') 

@section('content')  
			<input type="hidden" id="headerdata" value="{{ __("User") }}">
			<div class="content-area">
				<div class="mr-breadcrumb">
					<div class="row">
						<div class="col-lg-12">
								<h4 class="heading">{{ __("Users") }}</h4>
								<ul class="links">
									<li>
										<a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
									</li>
									<li>
										<a href="{{ route('admin-user-index') }}">{{ __("Users") }}</a>
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
											<tr>
						                        <th>{{ __("Name") }}</th>
						                        <th>{{ __("Email") }}</th>
						                        <th>{{ __("Options") }}</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	<div class="modal-header d-block text-center">
		<h4 class="modal-title d-inline-block">{{ __("Confirm Delete") }}</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">{{ __("You are about to delete this User.") }}</p>
            <p class="text-center">{{ __("Do you want to proceed?") }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Cancel") }}</button>
            <a class="btn btn-danger btn-ok">{{ __("Delete") }}</a>
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}
@endsection    

@section('scripts')
{{-- DATA TABLE --}}
<script type="text/javascript">
	var table = $('#geniustable').DataTable({
	   ordering: false,
       processing: true,
       serverSide: true,
       ajax: '{{ route('admin-user-datatables') }}',
       columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
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