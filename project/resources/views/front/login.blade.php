@extends('layouts.front')
@section('body')
<div class="form-wrap">
    <form method="POST" action="{{ route('login.submit') }}">
        {{ csrf_field() }}
        <div class="form-image">
            <img src="{{ asset('assets/front/img/image-form.png') }}" alt="">
        </div>
        <div class="form-content">
            <h2>Log In</h2>
            @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="mat-div">
                <label class="mat-label">Email</label>
                <input id="email" type="email" class="mat-input" name="email" :value="old('email')" required />
            </div>
            <div class="mat-div">       
                <label class="mat-label">Password</label>
                <input id="password" type="password" class="mat-input" name="password" required />
            </div>
            <input type="submit" class="btn gradient_button" value="Log In">
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </form>
</div>
@endsection
