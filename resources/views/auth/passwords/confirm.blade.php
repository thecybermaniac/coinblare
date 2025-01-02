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
                            <h4 class="nk-block-title">Confirm Password</h4>
                            <div class="nk-block-des">
                                <p>Please confirm your password before continuing.</p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('password.confirm') }}" method="POST">
                        @csrf
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
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Confirm Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('auth.footer')
    </div>
@endsection
