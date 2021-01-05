		<a class="clear">{{ __('New Notification(s).') }}
			@if(count($datas) > 0)
			<span id="user-notf-clear" class="clear-notf" data-href="{{ route('user-notf-clear') }}">
				{{ __('Clear All') }}
			</span>
			@endif
		</a>
		@if(count($datas) > 0)

		<ul>
		@foreach($datas as $data)
			<li>
				<a href="{{ route('admin-user-show',$data->user_id) }}">
					 <i class="fas fa-user"></i> {{ __('A New User Has Registered.') }}
					 <small class="d-block notf-time ">{{ $data->created_at->diffForHumans() }}</small>
				</a>
			</li>
		@endforeach

		</ul>

		@else 

		<a class="clear" href="javascript:;">
			{{ __('No New Notifications.') }}
		</a>

		@endif