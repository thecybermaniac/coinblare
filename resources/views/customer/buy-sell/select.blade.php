@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid method d-none mt-5" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-lg mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Choose Cryptocurrency To Trade</h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <form class="nk-stepper stepper-init is-alter"
                                action="{{ route('customer.buy-sell-select.post') }}" method="POST"
                                id="stepper-two-factor-auth" data-step-current="first" novalidate="novalidate"
                                style="display: block;">
                                @csrf
                                <div class="card-inner">
                                    <div class="nk-stepper-content">
                                        <div class="nk-stepper-steps stepper-steps">
                                            <div class="nk-stepper-step active">
                                                <h5 class="title mb-3">Available Cryptocurrencies</h5>
                                                <p class="sub-text">Select the currency you want to trade and click the
                                                    "continue" button</p>
                                                <div class="card shadow p-2"
                                                    @if ($crypto->count() > 12) id="scroll" @endif>
                                                    <ul class="row g-3 justify-content-center">
                                                        @foreach ($crypto as $c)
                                                            <li class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="tranx_coin" id="{{ $c->name }}"
                                                                        value="{{ $c->name }}-{{ $c->abbr }}"
                                                                        required="">
                                                                    <label class="custom-control-label"
                                                                        for="{{ $c->name }}">
                                                                        <span class="d-flex flex-column text-center mt-5">
                                                                            <span class="icon-wrap xl text-primary">
                                                                                <img src="{{ asset('uploads/' . $c->crypto_img) }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span
                                                                                class="lead-text mb-1 mt-3 text-capitalize">{{ $c->name }}</span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                            <li class="step-next" style="display: block;"><button type="submit"
                                                    class="btn btn-primary eg-toastr-default"
                                                    id="bs-btn">Continue</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
@endsection
