@extends('layouts.admin')

@section('content')
<div class="content-area">
    @include('includes.form-success')

    @if(Session::has('cache'))
    <div class="alert alert-success validation">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button>
        <h3 class="text-center">{{ Session::get("cache") }}</h3>
    </div>
    @endif
    <div class="row row-cards-one">
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg5">
                <div class="left">
                    <h5 class="title">{{ __('Total Users!') }}</h5>
                    <span class="number">{{count($users)}}</span>
                    <a href="{{route('admin-user-index')}}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg6">
                <div class="left">
                    <h5 class="title">{{ __('Total Portfolios!') }}</h5>
                    <span class="number">{{count($protfolios)}}</span>
                    <a href="{{ route('admin-portfolio-index') }}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg1">
                <div class="left">
                    <h5 class="title">{{ __('Total Blogs!') }}</h5>
                    <span class="number">{{count($blogs)}}</span>
                    <a href="{{ route('admin-blog-index') }}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cards-one">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <h5 class="card-header">{{ __('Recent User(s)') }}</h5>
                <div class="card-body">

                    <div class="my-table-responsiv">
                        <table class="table table-hover dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Username') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Joined') }}</th>
                                </tr>
                                @foreach($rusers as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <div class="action-list"><a href="{{ route('admin-user-show',$data->id) }}"><i
                                                    class="fas fa-eye"></i> {{ __('Details') }}</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <h5 class="card-header">{{ __('Recent Portfolio(s)') }}</h5>
                <div class="card-body">

                    <div class="my-table-responsiv">
                        <table class="table table-hover dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Portfolio Name') }}</th>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('Balance') }}</th>
                                    <th>{{ __('Created') }}</th>
                                </tr>
                                @foreach($rprotfolios as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->sbalance }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <div class="action-list"><a href="{{ route('admin-user-show',$data->id) }}"><i
                                                    class="fas fa-eye"></i> {{ __('Details') }}</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection