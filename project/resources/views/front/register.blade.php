@extends('layouts.front')
@section('body')
<div class="form-wrap">
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-image">
            <img src="{{ asset('assets/front/img/image-form.png') }}" alt="">
        </div>
        <div class="form-content">
            <h2>Sign Up</h2>
            <div class="mat-div">
                <label class="mat-label">Email Adress</label>
                <input type="text" class="mat-input" name="email" :value="old('email')" required>
            </div>
            <div class="mat-div">
                <label class="mat-label">Username</label>
                <input id="name" type="text" class="mat-input" name="name" :value="old('name')" required autocomplete="name">
            </div>
            <div class="mat-div">       
                <label class="mat-label">Password</label>
                <input id="password" type="password" class="mat-input" name="password" required autocomplete="new-password">
            </div>
            <div class="mat-div">       
                <label class="mat-label">Password Confirmation</label>
                <input id="password_confirmation" type="password" class="mat-input" name="password_confirmation" required autocomplete="new-password">
            </div>
            <input type="submit" class="btn gradient_button" value="Sign Up">
            <a href="{{ route('login') }}">Log In</a>
        </div>
    </form>
</div>
@endsection