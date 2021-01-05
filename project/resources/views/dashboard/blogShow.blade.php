@extends('layouts.user')
@section('body')
<div class="main-content-container container-fluid px-4 pt-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card card-small card-post card-post--1">
                <div class="card-post__image" style="background-image: url({{ $data->photo ? asset('assets/images/blogs/'.$data->photo):asset('assets/images/noimage.png') }}); min-height: 500px;">
                    <a href="#" class="card-post__category badge badge-pill badge-secondary">{{$data->category->name}}</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-fiord-blue" href="#">{{$data->title}}</a>
                    </h5>
                    <p class="card-text d-inline-block mb-3">{!! $data->details !!}</p>
                    <span class="text-muted">{{date('d M Y', strtotime($data->created_at))}} | </span>
                    <span class="text-muted">{{$data->views}} View(s) | </span>
                    <span class="text-muted">Soure : :{{$data->source}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection