@extends('layouts.user')
@section('styles')
    <style type="text/css">
        td, th {
            border: none!important;
            text-align: left!important;
        }
        .dataTables_info {
            display: none;
        }
    </style>
@endsection
@section('body')
    <div class="main-content-container container-fluid px-4">
        <div class="pt-4">
            @if(Session::has('failure'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failure') }}</p>
            @endif
        </div>
        <div class="row">
            <div class="col col-lg-8 col-md-12 col-sm-12">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0 ">Add Portfolio</h6>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <form action="{{route('hodl')}}" class="py-4" method="POST" id="form_portfolio">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="row mt-3">
                                        <div class="col-lg-3 col-md-4 col-sm-12 mt-1">
                                            <span>Name</span>
                                        </div>
                                        <div class="col-lg-9 col-md-6 col-sm-12">
                                            <input type="text" class="form-control" id="inp_name" name="name" value="{{ $portfolio == NULL ? '' : $portfolio->name }}" placeholder="Portfolio name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="row mt-3">
                                        <div class="col-lg-3 col-md-4 col-sm-12 mt-1">
                                            <span>Duration</span>
                                        </div>
                                        <div class="col-lg-9 col-md-6 col-sm-12">
                                            <select class="form-control" id="sel_duration" name="duration">
                                                <option {{ $portfolio != NULL && $portfolio->period == 7 ? "selected" : "" }} value="7">7 Days</option>
                                                <option {{ $portfolio != NULL && $portfolio->period == 30 ? "selected" : "" }} value="30">30 Days</option>
                                                <option {{ $portfolio != NULL && $portfolio->period == 90 ? "selected" : "" }} value="90">90 Days</option>
                                                <option {{ $portfolio != NULL && $portfolio->period == 180 ? "selected" : "" }} value="180">180 Days</option>
                                                <option {{ $portfolio != NULL && $portfolio->period == 365 ? "selected" : "" }} value="365">365 Days</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-1">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Coin</th>
                                                    <th>Amount</th>
                                                    <th>Price</th>
                                                    <th>Value</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_coin_list">
                                            @if($portfolio != NULL)
                                                @foreach($portfolio->activities as $activity)
                                                <tr class="{{ $activity->type }}">
                                                    <td title="{{$activity->coin->lterm}}">
                                                        <img src="{{ $activity->coin->image }}" width="20">&nbsp;
                                                        <span class="text-uppercase">{{ $activity->coin->sterm }}</span>
                                                    </td>
                                                    <td><span class='sp_coinAmount'>{{ $activity->amount }}</span></td>
                                                    <td>$<span class='sp_coinPrice'>{{ $activity->price }}</span></td>
                                                    <td>$<span class='sp_usdAmount'>{{ round($activity->price * $activity->amount) }}</span></td>
                                                    <td class='px-0 text-right'><button type='button' class='btn btn-sm btn-danger'><i class='material-icons'></i></button></td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-right">
                                <input id="inp_activity" type="hidden" name="activity">
                                <input type="hidden" name="pid" value="{{$portfolio == NULL ? 0 : $portfolio->id}}">
                                <button id="btn_save_portfolio" type="button" class="btn btn-success">Add Portfolio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4 col-md-12 col-sm-12 mb-4">
                <div class="card ubd-stats card-small h-100">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Coin List</h6>
                        <div class="block-handle"></div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table-coins" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Coin</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center"> 24h ∆ </th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coin_list as $key => $coin)
                                    @if($coin->status == 1)
                                    <tr class='" + $("#sp_coin_name").text() + "'>
                                        <td>#{{ $coin->id }}</td>
                                        <td title="{{ $coin->lterm }}">
                                            <img src="{{ $coin->image }}" width="25">&nbsp;
                                            {{ $coin->lterm }} (<span class="text-uppercase">{{ $coin->sterm }}</span>)
                                        </td>
                                        <td class="text-right">
                                            ${{$coin->price}}</td>
                                        <td class="text-right text-{{ $coin->price_24_cpercent > 0 ? 'success' : 'danger' }}">
                                            {{number_format($coin->price_24_cpercent,2)}} %<br>
                                            <small>${{$coin->price_24_camount}}</small></td>
                                        <td><button type="button" class="btn btn-sm btn-primary float-right" coin-id="{{ $key }}">Add</button></td>
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
    <div class="modal fade" id="addCoin" tabindex="-1" role="dialog" aria-labelledby="addCoinTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header p-3">
                <h5 class="modal-title">Add Coin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-3">
                    <div class="row my-2">
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                            Balance : $<span id="sp_rest_balance">{{ Auth::user()->balance }}</span></div>
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 text-right">
                            1 <span id="sp_coin_price">{{ $coin_list[0]->sterm }} = ${{ $coin_list[0]->price }}</span></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 mt-2">Coin</div>
                        <div class="col-md-10">
                            <select class="form-control" id="sel_coin_type">
                                @foreach($coin_list as $key => $coin)
                                @if($coin->status == 1)
                                <option value="{{ $key }}">
                                    {{ $coin->lterm }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">USD</div>
                        <div class="col-md-10">
                            <input id="inp_usdAmount" type="number" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2"><span id="sp_coin_name">{{ $coin_list[0]->sterm }}</span></div>
                        <div class="col-md-10">
                            <input id="inp_coinAmount" type="number" class="form-control" value="0" readonly>
                        </div>
                    </div>
              </div>
              <div class="modal-footer p-3">
                <button id="btn_add_portfolio" type="button" class="form-control btn btn-success">Add Coin</button>
                <button type="button" class="form-control btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    var rest_balance = <?=Auth::user()->balance ?>;
    var coin_list = <?=json_encode($coin_list) ?>;
    var coin_price = <?=$coin_list[0]->price ?>;
    var coin_image = '<?=$coin_list[0]->image ?>';

    $(document).ready(function() {
        $('#table-coins').DataTable({
        });

        $("#sel_coin_type").on("change", function() {
            coin_sterm = coin_list[$(this).val()]['sterm'];
            coin_price = coin_list[$(this).val()]['price'];
            coin_image = coin_list[$(this).val()]['image'];

            $("#sp_coin_price").text(coin_sterm + ' = $' + coin_price);
            $("#sp_coin_name").text(coin_sterm);
            $("#inp_coinAmount").val(($("#inp_usdAmount").val() / coin_price).toFixed(8));
        });

        $("#inp_usdAmount").on("focus", function() {
            $("#inp_usdAmount").select();
        });

        $("#inp_usdAmount").on("keyup", function() {
            if($("#inp_usdAmount").val() < 0)
                $("#inp_usdAmount").val(0);   
            if($("#inp_usdAmount").val() > rest_balance)
                $("#inp_usdAmount").val(rest_balance);   
            
            $("#inp_usdAmount").val(parseInt($("#inp_usdAmount").val()));
            $("#inp_coinAmount").val(($("#inp_usdAmount").val() / coin_price).toFixed(8));             
        });

        $("#btn_add_portfolio").on("click", function() {
            if($("#inp_usdAmount").val().length <= 0 || $("#inp_usdAmount").val() <= 0)
                return;

            rest_balance += $("#tbody_coin_list").find("." + $("#sp_coin_name").text()).find(".sp_usdAmount").text() * 1;
            $("#tbody_coin_list").find("." + $("#sp_coin_name").text()).remove();

            var tr_str = "<tr class='" + $("#sp_coin_name").text() + "'>";
            tr_str += "<td title='Bitcoin: Digital gold'>\
                <img src='" + coin_image + "' width='20'>&nbsp;\
                <span class='text-uppercase'>" + $("#sp_coin_name").text() + "</span></td>";
            tr_str += "<td><span class='sp_coinAmount'>" + $("#inp_coinAmount").val() + "</span></td>";
            tr_str += "<td>$<span class='sp_coinPrice'>" + coin_price + "</span></td>";
            tr_str += "<td>$<span class='sp_usdAmount'>" + $("#inp_usdAmount").val() + "</span></td>";
            tr_str += "<td class='px-0 text-right'><button type='button' class='btn btn-sm btn-danger'><i class='material-icons'></i></button></td>";
            tr_str += "</tr>";
            $("#tbody_coin_list").append(tr_str);

            rest_balance -= $("#inp_usdAmount").val();
            $("#sp_rest_balance").text(rest_balance);
            $("#inp_coinAmount").val(0);
            $("#inp_usdAmount").val(0);
            $("#addCoin").modal('hide');
        });

        $("#tbody_coin_list").on('click', 'button', function() {
            $(this).parent().parent().remove();

            rest_balance += $(this).parent().parent().find(".sp_usdAmount").text() * 1;
            $("#sp_rest_balance").text(rest_balance);
        });

        $("#table-coins").on('click', 'button', function() {
            $("#sel_coin_type").val($(this).attr('coin-id'));
            
            coin_sterm = coin_list[$(this).attr('coin-id')]['sterm'];
            coin_price = coin_list[$(this).attr('coin-id')]['price'];
            coin_image = coin_list[$(this).attr('coin-id')]['image'];

            $("#sp_coin_price").text(coin_sterm + ' = $' + coin_price);
            $("#sp_coin_name").text(coin_sterm);
            $("#inp_coinAmount").val(($("#inp_usdAmount").val() / coin_price).toFixed(8));
            $("#addCoin").modal();
        });

        $("#btn_save_portfolio").on('click', function() {
            var childs = $("#tbody_coin_list").children();

            if(childs.length <= 0 || $("#inp_name").val().length <= 0 || $("#sel_duration").val().length <= 0)
                return;

            var activity = [];
            for(var i = 0 ; i < childs.length; i++) {
                activity.push({
                    type : $(childs[i]).find('.text-uppercase').text(),
                    amount : $(childs[i]).find('.sp_coinAmount').text(),
                    price : $(childs[i]).find('.sp_coinPrice').text(),
                });
            }
            $("#inp_activity").val(JSON.stringify(activity));
            $("#form_portfolio").submit();
        });
    })
</script>
@endsection