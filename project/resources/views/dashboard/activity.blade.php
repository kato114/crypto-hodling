@extends('layouts.user')
@section('body')
<div class="main-content-container container-fluid px-4">
    <div class="row pt-4">
        <div class="col col-lg-12 col-md-12 col-sm-12">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">🏆 Activities</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-3">
                    <div class="table-responsive">
                        <table id="table-activities" class="table table-striped table-activities">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Portfolio</th>
                                    <th>Coin</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Value</th>
                                    <th>Profitability</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activity_list as $activity)
                                @php $diff = $coin_list[$activity->coin->sterm] * $activity->amount - $activity->price * $activity->amount; @endphp
                                <tr>
                                    <td><a href="{{ route('profile', $activity->portfolio->user->id) }}">{{ $activity->portfolio->user->name }}</a></td>
                                    <td>{{ $activity->portfolio->name }}</td>
                                    <td>
                                        <img class="symbol" src="{{ $activity->coin->image }}" width="20">&nbsp;
                                        {{ $activity->type }}
                                    </td>
                                    <td>{{ $activity->price }}</td>
                                    <td>{{ $activity->amount }}</td>
                                    <td>${{ number_format($coin_list[$activity->coin->sterm] * $activity->amount) }}</td>
                                    <td class="text-{{ $diff > 0 ? 'success' : 'danger' }}">
                                        {{ number_format($diff / $activity->amount / $activity->price * 100, 2) }}%
                                        <small style="opacity:.8">(${{ number_format($diff, 2) }})</small>
                                    </td>
                                    <td>{{ substr($activity->created_at, 0, 16) }}</td>
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
@endsection
@section('script')
@endsection