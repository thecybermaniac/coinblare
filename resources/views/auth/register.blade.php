@extends('auth.master')

@section('content')
    <div class="nk-content">
        <div class="nk-block nk-block-middle nk-auth-body wide-lg" style="margin-bottom: 100px">
            <div class="brand-logo pb-4 text-center">
                <a href="{{ route('website.home') }}">
                    <img src="{{ asset('images/coinblare-logo.png') }}" width="140" alt="logo">
                </a>
            </div>
            <div class="card card-bordered">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Register</h4>
                            <div class="nk-block-des">
                                <p>Create New Coinblare Account</p>
                            </div>
                        </div>
                    </div>
                    <form id="register-form" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" class="form-control form-control-lg required"
                                            id="name" placeholder="Enter your name" autocomplete="off">
                                    </div>
                                    @error('name')
                                        <b><i class="text-danger">{{ $message }}</i></b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email Address</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="email" class="form-control form-control-lg required"
                                            id="email" placeholder="Enter your email address" autocomplete="off">
                                    </div>
                                    @error('email')
                                        <b><i class="text-danger">{{ $message }}</i></b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                            data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password" class="form-control form-control-lg required"
                                            id="password" placeholder="Enter your passcode">
                                    </div>
                                    @error('password')
                                        <b><i class="text-danger">{{ $message }}</i></b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="password-confirm">Confirm Password</label>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                            data-target="password-confirm">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password_confirmation"
                                            class="required form-control form-control-lg" id="password-confirm"
                                            placeholder="Enter your passcode">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="custom-control custom-control-xs custom-checkbox">
                                        <input type="checkbox" class="custom-control-input required" id="checkbox">
                                        <label class="custom-control-label" for="checkbox">I agree to Coinblare Privacy Policy &amp;
                                                Terms.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button id="register" type="submit" class="btn btn-lg btn-primary"
                                        disabled>Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4"> Already have an account?
                        <a href="{{ route('login') }}">
                            <strong>Sign in instead</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('auth.footer')
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#checkbox').on('click', function() {
                if ($('#checkbox').is(':checked')) {
                    $('#register').prop('disabled', false);
                } else {
                    $('#register').prop('disabled', true);
                }
            })
        });
    </script>
@endpush
