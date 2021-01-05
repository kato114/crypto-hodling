@if(count($errors) > 0)
<div class="alert alert-danger validation">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<ul class="text-left">
	@foreach($errors->all() as $error)
		<li>{{$error}}</li>
	@endforeach
	</ul>
</div>
@endif

