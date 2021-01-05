@extends('layouts.user')
@section('body')
<div class="main-content-container container-fluid px-4 pt-4">
    <div class="row">
        @foreach($blogs as $blogg)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post card-post--1">
                <div class="card-post__image" style="background-image: url({{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }});">
                    <a href="#" class="card-post__category badge badge-pill badge-secondary">{{$blogg->category->name}}</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <a class="text-fiord-blue" href="{{route('blogShow', $blogg->id)}}">{{mb_strlen($blogg->title,'utf-8') > 50 ? mb_substr($blogg->title,0,50,'utf-8')."...":$blogg->title}}</a>
                    </h5>
                    <p class="card-text d-inline-block mb-3">{{substr(strip_tags($blogg->details),0,120)}}...</p>
                    <span class="text-muted">{{date('d M Y', strtotime($blogg->created_at))}}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection