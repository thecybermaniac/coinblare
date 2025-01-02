@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid d-none mt-5 mb-5" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">
                    <div class="buysell-nav text-center">
                        <ul class="nk-nav nav nav-tabs nav-tabs-s2">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#buy">Buy
                                    {{ request()->session()->get('crypto_abbr') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#sell">Sell
                                    {{ request()->session()->get('crypto_abbr') }}</a>
                            </li>
                        </ul>
                    </div><!-- .buysell-nav -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="buy">
                            <div class="buysell-title text-center">
                                <h3 class="title text-capitalize" style="font-family: Georgia;">Buy
                                    {{ request()->session()->get('crypto') }}</h3>
                            </div><!-- .buysell-title -->
                            <div class="buysell-block">
                                <form action="{{ route('customer.buy_coin') }}" id="purchase_form" method="POST"
                                    class="buysell-form">
                                    @csrf
                                    <div class="buysell-field form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="buysell-amount">Amount</label>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="number" class="form-control form-control-lg form-control-number"
                                                id="buysell-amount" name="amount_buy" placeholder="0.00">
                                            <div class="form-dropdown">
                                                <div class="text">USD</div>
                                            </div>
                                        </div>
                                    </div><!-- .buysell-field -->
                                    <div class="buysell-field form-action">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary" disabled
                                            id="continue-buy">Buy Crypto</button>
                                    </div><!-- .buysell-field -->
                                    <div class="buysell-field form-action mt-4">
                                        <a href="{{ route('customer.buy-sell-select') }}"
                                            class="btn btn-lg btn-block btn-warning"><em class="ni ni-arrow-left"></em>
                                            Back</a>
                                    </div><!-- .buysell-field -->
                                </form><!-- .buysell-form -->
                            </div><!-- .buysell-block -->
                        </div>
                        <div class="tab-pane" id="sell">
                            <div class="buysell-title text-center">
                                <h3 class="title text-capitalize" style="font-family: Georgia;">Sell
                                    {{ request()->session()->get('crypto') }}</h3>
                            </div><!-- .buysell-title -->
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered">
                                    <form class="nk-stepper stepper-init is-alter" action="{{ route('customer.sell_select') }}" method="POST" id="stepper-two-factor-auth"
                                        data-step-current="first" novalidate="novalidate" style="display: block;">
                                        @csrf
                                        <div class="card-inner">
                                            <div class="nk-stepper-content">
                                                <div class="nk-stepper-steps stepper-steps">
                                                    <div class="nk-stepper-step active">
                                                        <ul class="row g-3 justify-content-center mt-5">
                                                            @if (!is_null($crypto))
                                                            <li class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="sell_method" id="cryptobot" value="cryptobot"
                                                                        checked>
                                                                    <label class="custom-control-label" for="cryptobot">
                                                                        <span class="d-flex flex-column text-center mt-5">
                                                                            <span class="icon-wrap xl text-primary">
                                                                                <img src="{{ asset('images/coin/binance.png') }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="lead-text mb-1 mt-3 text-capitalize">Cryptobot {{ request()->session()->get('crypto') }} Wallet</span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            <li class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="sell_method" id="external" value="external"
                                                                        required="" @if (is_null($crypto))
                                                                            checked
                                                                        @endif>
                                                                    <label class="custom-control-label" for="external">
                                                                        <span class="d-flex flex-column text-center mt-5">
                                                                            <span class="icon-wrap xl text-primary">
                                                                                <img src="{{ asset('images/external.png') }}"
                                                                                    alt="">
                                                                            </span>
                                                                            <span class="lead-text mb-1 mt-4 text-capitalize">External Wallet</span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination mt-3">
                                                    <li class="step-next" style="display: block;"><button type="submit"
                                                            class="btn btn-primary eg-toastr-default" 
                                                            >Continue</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div><!-- .buysell -->
            </div>
        </div>
    </div>
@endsection
@push('script')
    {!! $validator->selector('#purchase_form') !!}

    <script>
        $(document).ready(function() {

            $('#purchase_form').on('submit', function(e) {

                e.preventDefault();

                form = $(this);

                if (form.valid()) {

                    var f = form.find(':submit');

                    var button = f.html();

                    f.attr("disabled", "disabled")
                        .html(
                            '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><span>Loading...</span>'
                        );

                    // $(form).ajaxSubmit();
                    $.ajax({
                        url: form.attr('action'),
                        type: "POST",
                        data: form.serialize(),
                        success: function(result) {

                            console.log(result);

                            f.removeAttr("disabled").html(button);

                            window.location.replace(result.redirect_url);

                        },
                        error: function(xhr, status, error) {

                            f.removeAttr("disabled").html(button);

                            $.each(xhr.responseJSON.errors, function(key, item) {
                                $('input[name = ' + key + ']')
                                    .removeClass('is-valid')
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback">' + item +
                                        '</div>');

                            });

                        }
                    });
                }
            });
        });
    </script>
@endpush
