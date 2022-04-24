@extends('layouts.app')

@section('title', 'Sign In')
@section('content')

<section id="content">
    <div class="content-wrap">
        <div class="container mw-xs">
            <div class="text-center">
                <h3 class="h1 fw-bolder mb-3">Sign In</h3>
                <div class="alert alert-warning mb-4" role="alert">
                    <p class="mb-0">You must be signed in to ask a question on <strong>Question & Answer</strong> <br />Sign in below or sign up</p>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <a href="#" class="social-icon si-small si-colored si-facebook" title="Facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>
                <a href="#" class="social-icon si-small si-colored si-google" title="google">
                    <i class="icon-google"></i>
                    <i class="icon-google"></i>
                </a>
                <a href="#" class="social-icon si-small si-colored si-appstore" title="apple">
                    <i class="icon-apple"></i>
                    <i class="icon-apple"></i>
                </a>
            </div>
            <div class="clear"></div>
            <div class="divider divider-center my-2"><span>OR</span></div>
            <form method="POST" class="mb-0 row" action="{{ route('login') }}">
                @csrf
                <div class="col-12 form-group">
                    <label class="nott ls0 fw-semibold mb-2" for="email">Your email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@site.com" value="{{ old('email') }}">
                </div>
                <div class="clear"></div>
                <div class="col-12 form-group">
                    <label class="nott ls0 fw-semibold mb-2" for="password">Password</label>
                    <div class="input-group">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="8+ characters required">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label nott ls0 mb-0 fw-semibold" for="inlineCheckbox2">Remember me</label>
                    </div>
                    <a href="#" class="text-smaller fw-medium"><u>Forgot Password?</u></a>
                </div>
                <div class="col-12 mt-4">
                    <button id="login-button" class="button button-large w-100 bg-alt py-2 rounded-1 fw-medium nott ls0 m-0" type="button">Login</button>
                </div>
            </form>
            <p class="mb-0 mt-4 text-center fw-semibold">Don't have an account? <a href="#"><u>Sign up</u></a></p>
        </div>
    </div>
</section>

@endsection