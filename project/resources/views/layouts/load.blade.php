@yield('styles')

@yield('content')

<script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendors/vue.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{asset('assets/admin/js/plugin.js')}}"></script>
<script src="{{asset('assets/admin/js/tag-it.js')}}"></script>
<script src="{{asset('assets/admin/js/load.js')}}"></script>

@yield('scripts')
