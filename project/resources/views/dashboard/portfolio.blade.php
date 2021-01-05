@extends('layouts.user')
@section('body')
<div class="main-content-container container-fluid px-4">
    <div class="row pt-4">
        <div class="col col-lg-6 col-md-12 col-sm-12">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">🏆 Top Winners</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-3">
                    <div class="table-responsive">
                        <table id="table-rankings" class="table table-striped table-rankings">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Holder</th>
                                    <th class="text-right">Balance</th>
                                    <th class="text-right">Profit</th>
                                    <th class="text-right">Profitability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($top_wins as $key => $top_winer)
                                @if($key >=50)
                                    continue;
                                @endif
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('profile', $top_winer->user->id) }}">{{ $top_winer->user->name }}</a></td>
                                    <td class="text-right">${{ number_format($top_winer->cbalance, 2) }}</td>
                                    <td class="text-right">${{ number_format($top_winer->diff, 2) }}</td>
                                    <td class="text-right text-{{ $top_winer->diff > 0 ? 'success' : 'danger' }}">
                                        {{ number_format($top_winer->diff / $top_winer->sbalance * 100, 2) }}%
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">🏅 Best Portfolio of Week</h6>
                            <div class="block-handle"></div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-3">
                            <div class="table-responsive">
                                <table id="table-rankings-round" class="table table-striped table-rankings">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Profitability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $key = 1 @endphp
                                        @foreach($portfolio_list as $portfolio)
                                        @if($portfolio->period == 7 && $key <= 25)
                                         <tr>
                                            <td>{{ $key ++ }}</td>
                                            <td>{{ $portfolio->name }}</td>
                                            <td class="text-{{ $portfolio->percent > 0 ? 'success' : 'danger' }}">
                                                {{ number_format($portfolio->percent, 2) }}%
                                                <small style="opacity:.8">(${{ number_format($portfolio->cbalance - $portfolio->sbalance, 2) }})</small>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">🏅 Best Portfolio of Half Year</h6>
                            <div class="block-handle"></div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-3">
                            <div class="table-responsive">
                                <table id="table-rankings-round" class="table table-striped table-rankings">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Profitability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $key = 1 @endphp
                                        @foreach($portfolio_list as $portfolio)
                                        @if($portfolio->period == 180 && $key <= 25)
                                        <tr>
                                            <td>{{ $key ++ }}</td>
                                            <td>{{ $portfolio->name }}</td>
                                            <td class="text-{{ $portfolio->percent > 0 ? 'success' : 'danger' }}">
                                                {{ number_format($portfolio->percent, 2) }}%
                                                <small style="opacity:.8">(${{ number_format($portfolio->cbalance - $portfolio->sbalance, 2) }})</small>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">🏅 Best Portfolio of Month</h6>
                            <div class="block-handle"></div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-3">
                            <div class="table-responsive">
                                <table id="table-rankings-round" class="table table-striped table-rankings">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Profitability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $key = 1 @endphp
                                        @foreach($portfolio_list as $portfolio)
                                        @if($portfolio->period == 30 && $key <= 25)
                                        <tr>
                                            <td>{{ $key ++ }}</td>
                                            <td>{{ $portfolio->name }}</td>
                                            <td class="text-{{ $portfolio->percent > 0 ? 'success' : 'danger' }}">
                                                {{ number_format($portfolio->percent, 2) }}%
                                                <small style="opacity:.8">(${{ number_format($portfolio->cbalance - $portfolio->sbalance, 2) }})</small>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">🏅 Best Portfolio of Year</h6>
                            <div class="block-handle"></div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-3">
                            <div class="table-responsive">
                                <table id="table-rankings-round" class="table table-striped table-rankings">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Profitability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $key = 1 @endphp
                                        @foreach($portfolio_list as $portfolio)
                                        @if($portfolio->period == 365 && $key <= 25)
                                        <tr>
                                            <td>{{ $key ++ }}</td>
                                            <td>{{ $portfolio->name }}</td>
                                            <td class="text-{{ $portfolio->percent > 0 ? 'success' : 'danger' }}">
                                                {{ number_format($portfolio->percent, 2) }}%
                                                <small style="opacity:.8">(${{ number_format($portfolio->cbalance - $portfolio->sbalance, 2) }})</small>
                                            </td>
                                        </tr>
                                        @endif
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
@endsection
@section('script')
@endsection