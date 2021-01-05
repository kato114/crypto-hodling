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
                        <h4 class="heading">{{ __("Portfolio Details") }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("Back") }}</a></h4>
                        <ul class="links">
                            <li>
                                <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                            </li>
                            <li>
                                <a href="{{ route('admin-user-index') }}">{{ __("Portfolios") }}</a>
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
                                <div class="col-md-12">
                                    <div class="table-responsive show-table">
                                        <table class="table">
                                            <tr>
                                                <th>{{ __("Username") }}</th>
                                                <td>{{$data->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Name") }}</th>
                                                <td>{{$data->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Balance") }}</th>
                                                <td>{{$data->cbalance}} 
                                                    <small class="text-{{ ($data->cbalance - $data->sbalance) > 0 ? 'success' : 'danger'}}">
                                                        ({{ $data->cbalance - $data->sbalance }})
                                                    </small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Period") }}</th>
                                                <td>{{$data->period}} Days</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Start Date") }}</th>
                                                <td>{{ substr($data->created_at, 0, 10) }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("End Date") }}</th>
                                                <td>{{ substr($data->end_date, 0, 10) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-table-wrap">
                            <div class="order-details-table">
                                <div class="mr-table">
                                    <h4 class="title">{{ __("Added Coins") }}</h4>
                                    <div class="table-responsive">
                                        <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __("No") }}</th>
                                                    <th>{{ __("Coin") }}</th>
                                                    <th>{{ __("Price") }}</th>
                                                    <th>{{ __("Amount") }}</th>
                                                    <th>{{ __("Value") }}</th>
                                                    <th>{{ __("Profitability") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->activities as $key => $activity)
                                                @php $diff = $coin_list[$activity->type] * $activity->amount - $activity->price * $activity->amount; @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img class="symbol" src="{{ asset('assets/dashboard/images/coins/' . $activity->type . '.png') }}" width="20">&nbsp;
                                                        {{ $activity->type }}
                                                    </td>
                                                    <td>{{ $activity->price }}</td>
                                                    <td>{{ $activity->amount }}</td>
                                                    <td>${{ number_format($coin_list[$activity->type] * $activity->amount, 2) }}</td>
                                                    <td class="text-{{ $diff > 0 ? 'success' : 'danger' }}">
                                                        {{ number_format($diff / $activity->amount / $activity->price * 100, 2) }}%
                                                        <small style="opacity:.8">(${{ number_format($diff, 2) }})</small>
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