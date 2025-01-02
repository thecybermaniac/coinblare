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
                            <h4 class="nk-block-title">Sign-In</h4>
                            <div class="nk-block-des">
                                <p>Access the Coinblare panel using your email and passcode.</p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email">Email or Username</label>
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
                            <div class="form-label-group">
                                <label class="form-label" for="password">Password</label>
                                <a class="link link-primary link-sm" href="{{ route('password.request') }}">Forgot Code?</a>
                            </div>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                    data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" name="password" class="form-control form-control-lg" id="password"
                                    placeholder="Enter your passcode">
                            </div>
                            @error('password')
                                <b><i class="text-danger">{{ $message }}</i></b>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4"> New on our platform? <a
                            href="{{ route('register') }}">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
        @include('auth.footer')
    </div>
@endsection
