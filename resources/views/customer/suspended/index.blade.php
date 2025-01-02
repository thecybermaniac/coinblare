@extends('auth.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="components-preview wide-sm mx-auto">
                <div class="nk-block nk-block-lg">
                    <div class="brand-logo pb-4 text-center mt-5">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{ asset('images/logo.png') }}" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{ asset('images/logo-dark.png') }}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="card card-bordered p-4 mt-5">
                        <center>
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                <h4 class="nk-modal-title">Account Suspended!</h4>
                                <div class="nk-modal-text">
                                    <p class="caption-text">Dear {{ Auth::user()->name }}, your account has been suspended due to some suspicious activities
                                    in it. If you think this is a mistake, please contact our customer support via our email. <a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a>.
                                Thanks!</p>
                                </div>
                                <div class="nk-modal-action-lg">
                                    <ul class="g-4">
                                        <li>
                                            <a href="{{ route('customer.home') }}"
                                                class="btn btn-lg btn-mw btn-primary">
                                                Go Home
                                            </a>
                                        </li>
                                        <ul class="btn-group gx-4">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="btn btn-lg btn-mw btn-outline-link">
                                                    Log Out
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </center>
                    </div>
                </div><!-- .nk-block -->
            </div><!-- .components-preview -->
        </div>
    </div>
    @include('auth.footer')
</div>
@endsection