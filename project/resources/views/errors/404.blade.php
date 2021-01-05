@extends('layouts.front')
@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="pages">
          <li>
            <a href="{{ route('home') }}">
              404
            </a>
          </li>
          <li>
            <a href="javascript:;">
              404
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->

<section class="fourzerofour">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <img src="{{ $gs->error_banner ? asset('assets/images/'.$gs->error_banner):asset('assets/images/noimage.png') }}" alt="">
            <h4 class="heading">
              404
            </h4>
            <p class="text">
              404
            </p>
            <a class="mybtn1" href="{{ route('home') }}">404</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection