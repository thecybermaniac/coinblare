@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-sub"><span>Account Wallet</span> </div><!-- .nk-block-head-sub -->
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Wallets</h2>
                            <div class="nk-block-des">
                                <p>Here is the list of your wallets!</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="#deposit" data-bs-toggle="modal" class="btn btn-outline-primary">Deposit Crypto</a>
                            @if ($wallet->count() >= 1)
                                <a href="#withdraw" data-bs-toggle="modal" class="btn btn-outline-warning">Withdraw
                                    Crypto</a>
                            @endif
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-block-head-sm">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title title">Crypto Wallets</h5>
                        </div>
                    </div>
                    <div class="row g-gs">
                        @if ($wallet->count() < 1)
                            <div class="col-12">
                                <div class="card p-5">
                                    <h5 class="text-capitalize text-center"
                                        style="font-style: italic; font-family: Courier New;">No Wallets Yet!</h5>
                                    <p class="text-capitalize text-center text-white" style="font-style: italic;">Deposit or
                                        buy a cryptocurrency to automatically create a wallet.</p>
                                </div>
                            </div>
                        @else
                            @foreach ($wallet as $wall)
                                <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                                    <div class="card card-bordered">
                                        <div class="nk-wgw">
                                            <div class="nk-wgw-inner">
                                                <a class="nk-wgw-name" href="html/crypto/wallet-bitcoin.html">
                                                    <div class="nk-wgw-icon bg-transparent">
                                                        <img src="{{ asset('uploads/' . $wall->wallet_symbol) }}"
                                                            alt="">
                                                    </div>
                                                    <h5 class="nk-wgw-title title text-capitalize">
                                                        <span>{{ $wall->crypto_wallet }} Wallet</span>
                                                    </h5>
                                                </a>
                                                <div class="nk-wgw-balance">
                                                    <div class="amount">
                                                        <span>{{ number_format($wall->balance_in_crypto, 10) }}</span>
                                                        <span class="currency currency-btc">{{ $wall->abbr }}</span>
                                                    </div>
                                                    <div class="amount-sm">
                                                        {{ number_format($wall->balance_in_currency, 2) }}<span
                                                            class="currency currency-usd">USD</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            @endforeach
                        @endif
                    </div><!-- .row -->
                </div>
            </div>
        </div>
    </div>

    {{-- Deposit Modal --}}
    <div class="modal fade zoom" tabindex="-1" id="deposit">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title" style="font-family: Georgia;">Deposit Crypto</h5>
                    <form action="{{ route('customer.wallets.deposit') }}" method="POST" id="deposit-form" class="mt-4">
                        @csrf
                        <div class="buysell-field">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="crypto" data-search="on" data-ui="xl"
                                        id="outlined-select">
                                        @foreach ($crypto as $c)
                                            <option value="{{ $c->name }}">{{ Str::ucfirst($c->name) }}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label-outlined" for="outlined-select">Select Crypto</label>
                                </div>
                            </div>
                        </div><!-- .buysell-field -->
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Amount</label>
                            </div>
                            <div class="form-control-group">
                                <input type="number" class="form-control form-control-lg form-control-number"
                                    id="buysell-amount" name="amount" placeholder="0.00" autocomplete="off">
                                <div class="form-dropdown">
                                    <div class="text"><em class="icon ni ni-coins"></em></div>
                                </div>
                            </div>
                        </div><!-- .buysell-field -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Deposit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Withdraw Modal --}}
    <div class="modal fade zoom" tabindex="-1" id="withdraw">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title" style="font-family: Georgia;">Withdraw Crypto</h5>
                    <form action="{{ route('customer.wallets.withdraw') }}" method="POST" id="withdraw-form"
                        class="mt-4">
                        @csrf
                        <div class="buysell-field">
                            <div class="form-group">
                                <div class="form-control-group">
                                    <select class="form-select js-select2" name="crypto" data-ui="xl"
                                        data-search="on" id="outline-select2">
                                        <option value="" disabled>Select Crypto</option>
                                        @foreach ($crypto as $c)
                                            <option value="{{ $c->name }}">{{ Str::ucfirst($c->name) }}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label-outlined" for="outline-select2">Select Crypto</label>
                                </div>
                                @error('crypto')
                                    <i class="text-danger">{{ $message }}</i>
                                @enderror
                            </div>
                        </div><!-- .buysell-field -->
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Amount</label>
                            </div>
                            <div class="form-control-group">
                                <input type="number" class="form-control form-control-lg form-control-number"
                                    id="buysell-amount" name="amount" placeholder="0.00" autocomplete="off">
                                <div class="form-dropdown">
                                    <div class="text"><em class="icon ni ni-coins"></em></div>
                                </div>
                            </div>
                            @error('amount')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div><!-- .buysell-field -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Withdraw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    {!! $validator->selector('#deposit-form') !!}
    {!! $validator2->selector('#withdraw-form') !!}
    <script>
        $(document).ready(function() {

            $('#deposit-form').on('submit', function(e) {

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

            $('#withdraw-form').on('submit', function(e) {

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
