@extends('layouts.user')
@section('body')
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{!! Session::get('message') !!}</p>
    @endif
    <div class="main-content-container container-fluid px-4">
        <div class="row pt-4">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="stats-small card card-small">
                    <div class="card-body px-0 pb-0">
                        <div class="d-flex px-3">
                            <div class="stats-small__data">
                                <span class="stats-small__label mb-1 text-uppercase">Total Balance</span>
                                <h6 class="stats-small__value count m-0">${{ number_format($tbalance['cbalance'], 2) }}</h6>
                            </div>
                            <div class="stats-small__data text-right align-items-center">
                                <span class="stats-small__percentage stats-small__percentage--{{ $tbalance['cbalance'] - $tbalance['sbalance'] > 0 ? 'increase' : 'decrease'}}">
                                    {{ $tbalance['sbalance'] == 0? 0 : number_format(($tbalance['cbalance'] - $tbalance['sbalance']) / $tbalance['sbalance'] * 100, 1) }}%
                                </span>
                            </div>
                        </div>
                        <canvas height="60" class="analytics-overview-stats-small-1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="stats-small card card-small">
                    <div class="card-body px-0 pb-0">
                        <div class="d-flex px-3">
                            <div class="stats-small__data">
                                <span class="stats-small__label mb-1 text-uppercase">Portfolio Balance</span>
                                <h6 class="stats-small__value count m-0">${{ number_format($pbalance['cbalance'], 2) }}</h6>
                            </div>
                            <div class="stats-small__data text-right align-items-center">
                                <span class="stats-small__percentage stats-small__percentage--{{ $pbalance['cbalance'] - $pbalance['sbalance'] > 0 ? 'increase' : 'decrease'}}">
                                    {{ $pbalance['sbalance'] == 0? 0 : number_format(($pbalance['cbalance'] - $pbalance['sbalance']) / $pbalance['sbalance'] * 100, 1) }}%
                                </span>
                            </div>
                        </div>
                        <canvas height="60" class="analytics-overview-stats-small-3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="stats-small card card-small">
                    <div class="card-body px-0 pb-0">
                        <div class="d-flex px-3">
                            <div class="stats-small__data">
                                <span class="stats-small__label mb-1 text-uppercase">Left Balance</span>
                                <h6 class="stats-small__value count m-0">${{ number_format(Auth::user()->balance,2) }}</h6>
                            </div>
                        </div>
                        <canvas height="60" class="analytics-overview-stats-small-2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="stats-small card card-small">
                    <div class="card-body px-0 pb-0">
                        <div class="d-flex px-3">
                            <div class="stats-small__data">
                                <span class="stats-small__label mb-1 text-uppercase">Ranking</span>
                                <h6 class="stats-small__value count m-0">#1</h6>
                            </div>
                        </div>
                        <canvas height="60" class="analytics-overview-stats-small-4"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Small Stats Blocks -->
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12">
                @if(count($portfolio_list) == 0)
                <h5 class="text-center my-5">There is no portfolio.</h5>
                @else
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        @foreach($portfolio_list as $key => $portfolio)
                        @if($key % 2 == 0)
                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom pb-0">
                                <h6 class="float-left">Portfolio : {{ $portfolio->name }}</h6>
                                @if($portfolio->status == 0)
                                <div class="float-right"><a class="nav-link m-0" href="{{ route('hodl', array('pid' => $portfolio->id)) }}">Edit</a></div>
                                @endif
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Coin</th>
                                                <th>Amount</th>
                                                <th>Value</th>
                                                <th>Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($portfolio->activities as $activity)
                                            @php 
                                                $cha = $activity->amount * $activity->coin->price - $activity->amount * $activity->price;
                                            @endphp
                                            <tr>
                                                <td title="{{$activity->coin->lterm}}">
                                                    <img src="{{ $activity->coin->image }}" width="20">&nbsp;
                                                    <span class="text-uppercase">{{ $activity->coin->sterm }}</span>
                                                </td>
                                                <td>{{ number_format($activity->amount, 8) }}</td>
                                                <td>${{ number_format($activity->amount * $activity->coin->price, 2) }}</td>
                                                <td class="text-{{ $cha > 0 ? 'success' : 'danger' }}">
                                                    {{ number_format($cha / $activity->amount / $activity->price * 100, 2) }}%
                                                    <small style="opacity:.8">(${{ number_format($cha, 2) }})</small>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr class="{{ $portfolio->cbalance - $portfolio->sbalance > 0 ? 'table-success' : 'table-danger' }}">
                                                <td title="Total Amount">
                                                    <img src="{{ asset('assets/dashboard/images/coins/usd.png') }}" width="20">&nbsp;
                                                    <span class="text-uppercase">USD</span>
                                                </td>
                                                <td></td>
                                                <td>${{ number_format($portfolio->cbalance, 2) }}</td>
                                                <td class="text-{{ $portfolio->cbalance - $portfolio->sbalance > 0 ? 'success' : 'danger' }}">
                                                    {{ number_format(($portfolio->cbalance - $portfolio->sbalance) / $portfolio->sbalance * 100, 2) }}%
                                                    <small style="opacity:.8">(${{ number_format($portfolio->cbalance - $portfolio->sbalance, 2) }})</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="float-lg-left">
                                        <small>Duration : 
                                        {{ substr($portfolio->created_at, 0, 10) }} ~
                                        {{ substr($portfolio->end_date, 0, 10) }}</small>
                                    </div>
                                    <div class="float-lg-right">
                                        @php 
                                            $target = new DateTime($portfolio->end_date);
                                            $origin = new DateTime('NOW');
                                            $interval = $origin->diff($target);
                                        @endphp
                                        <small class="text-danger"><b>Time Remaining</b> : <strong>{{$interval->format('%aD %HH %IM')}}</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        @foreach($portfolio_list as $key => $portfolio)
                        @if($key % 2 == 1)
                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom pb-0">
                                <h6 class="float-left">Portfolio : {{ $portfolio->name }}</h6>
                                @if($portfolio->status == 0)
                                <div class="float-right"><a class="nav-link m-0" href="{{ route('hodl', array('pid' => $portfolio->id)) }}">Edit</a></div>
                                @endif
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Coin</th>
                                                <th>Amount</th>
                                                <th>Value</th>
                                                <th>Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($portfolio->activities as $activity)
                                            @php 
                                                $cha = $activity->amount * $activity->coin->price - $activity->amount * $activity->price;
                                            @endphp
                                            <tr>
                                                <td title="{{$activity->coin->lterm}}">
                                                    <img src="{{ $activity->coin->image }}" width="20">&nbsp;
                                                    <span class="text-uppercase">{{ $activity->coin->sterm }}</span>
                                                </td>
                                                <td>{{ number_format($activity->amount, 8) }}</td>
                                                <td>${{ number_format($activity->amount * $activity->coin->price, 2) }}</td>
                                                <td class="text-{{ $cha > 0 ? 'success' : 'danger' }}">
                                                    {{ number_format($cha / $activity->amount / $activity->price * 100, 2) }}%
                                                    <small style="opacity:.8">(${{ number_format($cha, 2) }})</small>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr class="{{ $portfolio->cbalance - $portfolio->sbalance > 0 ? 'table-success' : 'table-danger' }}">
                                                <td title="Total Amount">
                                                    <img src="{{ asset('assets/dashboard/images/coins/usd.png') }}" width="20">&nbsp;
                                                    <span class="text-uppercase">USD</span>
                                                </td>
                                                <td></td>
                                                <td>${{ number_format($portfolio->cbalance, 2) }}</td>
                                                <td class="text-{{ $portfolio->cbalance - $portfolio->sbalance > 0 ? 'success' : 'danger' }}">
                                                    {{ number_format(($portfolio->cbalance - $portfolio->sbalance) / $portfolio->sbalance * 100, 2) }}%
                                                    <small style="opacity:.8">(${{ number_format($portfolio->cbalance - $portfolio->sbalance, 2) }})</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="float-lg-left">
                                        <small>Duration : 
                                        {{ substr($portfolio->created_at, 0, 10) }} ~
                                        {{ substr($portfolio->end_date, 0, 10) }}</small>
                                    </div>
                                    <div class="float-lg-right">
                                        @php 
                                            $target = new DateTime($portfolio->end_date);
                                            $origin = new DateTime('NOW');
                                            $interval = $origin->diff($target);
                                        @endphp
                                        <small class="text-danger"><b>Time Remaining</b> : <strong>{{$interval->format('%aD %HH %IM')}}</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection