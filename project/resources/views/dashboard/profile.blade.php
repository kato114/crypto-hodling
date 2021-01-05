@extends('layouts.user')
@section('body')
<div class="main-content-container container-fluid px-4">
    <div class="row mt-4">
        <div class="col-sm-12f col-lg-4">
            <div class="card card-small user-details mb-4">
                <div class="card-header p-0">
                    <div class="user-details__bg">
                        <img src="{{ asset('assets/dashboard/images/user-profile/up-user-details-background.jpg') }}" alt="User Details Background Image">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="user-details__avatar mx-auto">
                        @if($user->profile_photo_path == NULL)
                            <img src="{{ asset('assets/images/'.$gs->user_image) }}" alt="User Avatar">
                        @else
                            <img src="{{ asset('/assets/images/users/' . $user->profile_photo_path) }}" alt="User Avatar">
                        @endif
                    </div>
                    <h4 class="text-center m-0 mt-2">{{ $user->name }}</h4>
                    <p class="text-center text-light m-0 mb-2">{{ $user->bio }}</p>
                    <ul class="user-details__social user-details__social--primary d-table mx-auto mb-4">
                        <li class="mx-1"><a href="{{ $user->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="mx-1"><a href="{{ $user->twitter }}"><i class="fab fa-twitter"></i></a></li>
                        <li class="mx-1"><a href="{{ $user->dribbble }}"><i class="fab fa-slack"></i></a></li>
                    </ul>
                    <div class="user-details__user-data border-top border-bottom p-4">
                        <div class="row mb-3">
                            <div class="col w-50">
                                <span>Email</span>
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="col w-50">
                                <span>Location</span>
                                <span>{{ $user->location }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col w-50">
                                <span>Phone</span>
                                <span>{{ $user->phonenumber }}</span>
                            </div>
                            <div class="col w-50">
                                <span>Account Number</span>
                                <span>{{ $user->id }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="user-details__tags p-4">
                        @if($follow_status == true)
                            <span style="line-height: 33px;">Status : Following</span>
                            <a class="float-right btn btn-xs btn-danger" href="{{ route('follow', $user->id) }}">Unfollow</a>
                        @elseif($follow_status == false && $user->id != Auth::user()->id)
                            <span style="line-height: 33px;">Status : Not following</span>
                            <a class="float-right btn btn-xs btn-success" href="{{ route('follow', $user->id) }}">Follow</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card card-small user-teams mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Followers</h6>
                    <div class="block-handle"></div>
                </div>
                <div class="card-body p-0">
                    <div class="container-fluid">
                        @foreach($user->followers as $follower)
                        <div class="row px-3">
                            <div class="user-teams__image col-2 col-sm-1 col-lg-2 p-0 my-auto">
                                @if($follower->user->profile_photo_path == NULL)
                                    <img src="{{ asset('assets/images/'.$gs->user_image) }}" alt="User Avatar">
                                @else
                                    <img src="{{ asset('/assets/images/users/' . $follower->user->profile_photo_path) }}" alt="User Avatar">
                                @endif
                            </div>
                            <div class="col user-teams__info pl-3">
                                <h6 class="m-0">{{ $follower->user->name }}</h6>
                                <span class="text-light">{{ count($follower->user->followers) }} followers</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-small user-stats mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-sm-3 text-center mb-1">
                            <h4 class="m-0">1</h4>
                            <span class="text-light text-uppercase">Ranking</span>
                        </div>
                        <div class="col-6 col-sm-3 text-center mb-1">
                            <h4 class="m-0">{{ count($user->followers) }}</h4>
                            <span class="text-light text-uppercase">Followers</span>
                        </div>
                        <div class="col-6 col-sm-3 text-center mb-1">
                            <h4 class="m-0">${{ number_format($tbalance['cbalance'], 2) }}</h4>
                            <span class="text-light text-uppercase">Total capital</span>
                        </div>
                        <div class="col-6 col-sm-3 text-center mb-1">
                            <h4 class="m-0">{{ $tbalance['sbalance'] == 0? 0 : number_format(($tbalance['cbalance'] - $tbalance['sbalance']) / $tbalance['sbalance'] * 100, 1) }}%</h4>
                            <span class="text-light text-uppercase">Performance</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-0">
                    <div class="row">
                        <div class="col-12 col-sm-12 border-top pb-3 pt-2">
                            <div class="progress-wrapper">
                                <span class="progress-label">Profit</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: {{($tbalance['cbalance'] - $tbalance['sbalance']) / $tbalance['sbalance'] * 100}}%;">
                                        <span class="progress-value">{{ number_format(($tbalance['cbalance'] - $tbalance['sbalance']) / $tbalance['sbalance'] * 100, 1) }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @if(count($portfolio_list) == 0)
                <h5 class="text-center my-5">There is no portfolio.</h5>
                @else
                @foreach($portfolio_list as $portfolio)
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom pb-0">
                        <h6 class="float-left">Portfolio : {{ $portfolio->name }}</h6>
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
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <small>Duration : 
                            {{ substr($portfolio->created_at, 0, 10) }} ~
                            {{ substr($portfolio->end_date, 0, 10) }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection