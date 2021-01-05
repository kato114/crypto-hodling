@extends('layouts.user')
@section('body')
    <div class="main-content-container container-fluid px-4">
        <div class="row pt-4">
            <div class="col-12">
                <div class="card card-small mb-4">
                    <div class="card-body px-0 pb-3">
                        <div class="px-3">
                            <div class="stats-small__data">
                                <span class="stats-small__label mb-1 text-uppercase">Total capital</span>
                                <h6 class="stats-small__value count m-0">$1,116.95</h6>
                            </div>
                        </div>
                        <canvas id="myChart" style="width:80vw; height: 50vh"></canvas>
                    </div>
                </div>
                <div class="card card-small mb-4">
                    <div class="card-body px-0 pb-3">
                        <div class="px-3">
                            <h6> 
                                <img src="{{ asset('assets/dashboard/images/coins/btc.png') }}" width="20"> 
                                <span>Bitcoin: <small>Digital gold</small></span>
                                <a href="#" class="btn btn-xs btn-fill btn-warning p-1 float-right">Sell</a>
                                <a href="#" class="btn btn-xs btn-fill btn-info p-1 float-right mr-1">Buy</a>
                            </h6>
                        </div>
                        <canvas id="myChart1" style="width:80vw"></canvas>
                    </div>
                </div>
                <div class="card card-small mb-4">
                    <div class="card-body px-0 pb-3">
                        <div class="px-3">
                            <h6> 
                                <img src="{{ asset('assets/dashboard/images/coins/xrp.png') }}" width="20"> 
                                <span>Ripple: <small>Enterprise payment settlement network</small></span>
                                <a href="#" class="btn btn-xs btn-fill btn-warning p-1 float-right">Sell</a>
                                <a href="#" class="btn btn-xs btn-fill btn-info p-1 float-right mr-1">Buy</a>
                            </h6>
                        </div>
                        <canvas id="myChart2" style="width:80vw"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['BTC', 'XRP', 'ETH'],
                datasets: [{
                    label: '# of Votes',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                    ],
                    borderColor: [
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                        'rgba(255, 255, 255, 1)',
                    ],
                    borderWidth: 3
                }]
            }
        });

        ctx = document.getElementById('myChart1').getContext('2d');

        var stackedLine = new Chart(ctx, {
            type: 'line',
            data: [{
                x: 10,
                y: 20
            }, {
                x: 15,
                y: 10
            }],
            options: {
                scales: {
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });

        ctx = document.getElementById('myChart2').getContext('2d');

        var stackedLine = new Chart(ctx, {
            type: 'line',
            data: [{
                x: 10,
                y: 20
            }, {
                x: 15,
                y: 10
            }],
            options: {
                scales: {
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    });
</script>
@endsection