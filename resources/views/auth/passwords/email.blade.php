@extends('auth.master')

@section('content')
    <div class="nk-content">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
            <div class="brand-logo pb-4 text-center">
                <a href="{{ route('website.home') }}">
                    <img src="{{ asset('images/coinblare-logo.png') }}" width="140" alt="logo">
                </a>
            </div>
            <div class="card card-bordered">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Reset Password</h4>
                            <div class="nk-block-des">
                                <p>Reset your Cryptobot passcode using your email.</p>
                            </div>
                        </div>
                        @if (session('status'))
                            <div class="nk-block-content mt-1">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('status') }}</strong>
                                </div>
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email">Email Address</label>
                            </div>
                            <div class="form-control-wrap">
                                <input type="text" name="email" class="form-control form-control-lg" id="email"
                                    placeholder="Enter your email address">
                            </div>
                            @error('email')
                                <b><i class="text-danger">{{ $message }}</i></b>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Send Password Reset
                                Link</button>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4"> Remembered your passcode? <a
                            href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
        @include('auth.footer')
    </div>
@endsection
