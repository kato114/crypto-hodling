@extends('layouts.admin')

@section('styles')

<style type="text/css">
    .table-responsive {
    overflow-x: hidden;
}
table#example2 {
    margin-left: 10px;
}

</style>

@endsection

@section('content')

                    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">{{ __("User Details") }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("Back") }}</a></h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin-user-index') }}">{{ __("Users") }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin-user-show',$data->id) }}">{{ __("Details") }}</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                            <div class="add-product-content1 customar-details-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-description">
                                            <div class="body-area">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="user-image">
                                                            <img src="{{ $data->profile_photo_path ? asset('assets/images/users/'.$data->profile_photo_path):asset('assets/images/'.$gs->user_image)}}" alt="No Image">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="table-responsive show-table">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>{{ __("ID#") }}</th>
                                                                    <td>{{$data->id}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __("Email") }}</th>
                                                                    <td>{{$data->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __("Username") }}</th>
                                                                    <td>{{$data->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __("Social") }}</th>
                                                                    <td>
                                                                        Facebook : {{$data->facebook}}<br>
                                                                        Twitter : {{$data->twitter}}<br>
                                                                        Dribbble : {{$data->dribbble}}<br>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="table-responsive show-table">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>{{ __("Joined") }}</th>
                                                                    <td>{{$data->created_at->diffForHumans()}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __("Phone") }}</th>
                                                                    <td>{{$data->phonenumber}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __("Full Name") }}</th>
                                                                    <td>{{$data->firstname}} {{$data->lastname}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __("Description") }}</th>
                                                                    <td>{{$data->bio}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-table-wrap">
                                                <div class="order-details-table">
                                                    <div class="mr-table">
                                                        <h4 class="title">{{ __("Portfolios") }}</h4>
                                                        <div class="table-responsive">
                                                                <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __("No") }}</th>
                                                                            <th>{{ __("Portfolio Name") }}</th>
                                                                            <th>{{ __("Start Balance") }}</th>
                                                                            <th>{{ __("Current Balance") }}</th>
                                                                            <th>{{ __("Period") }}</th>
                                                                            <th>{{ __("Start Date") }}</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($data->portfolios as $key => $portfolio)
                                                                        <tr>
                                                                            <td>{{ $key + 1 }}</td>
                                                                            <td>{{ $portfolio->name }}</td>
                                                                            <td>{{ $portfolio->sbalance }}</td>
                                                                            <td>{{ $portfolio->cbalance }}</td>
                                                                            <td>{{ $portfolio->period }} Days</td>
                                                                            <td>{{ $portfolio->created_at }}</td>
                                                                            <td>
                                                                                <a href="{{ route('admin-portfolio-show', $portfolio->id) }}" class="view-details">
                                                                                    <i class="fas fa-check"></i>{{ __("Details") }}
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
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
$('#example2').dataTable( {
  "ordering": false,
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'  : true
} );
</script>


@endsection