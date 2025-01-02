@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid d-none mt-5 mb-5" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">
                            <div class="buysell-title text-center">
                                <h3 class="title text-capitalize" style="font-family: Georgia;">Sell
                                    {{ request()->session()->get('crypto') }}</h3>
                            </div><!-- .buysell-title -->
                            <div class="buysell-block">
                                <form action="{{ route('customer.sell_coin') }}" id="sell-form" method="POST"
                                    class="buysell-form">
                                    @csrf
                                    <div class="buysell-field form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="buysell-amount">Amount to Sell</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right mx-3" style="margin-top: 19px;">
                                                <div class="text">{{ request()->session()->get('crypto_abbr') }}</div>
                                            </div>
                                            <input type="number" class="form-control form-control-lg form-control-number" style="padding-right: 50px;"
                                                id="sell-coin" name="sell_amount" placeholder="0.00" autocomplete="off">
                                        </div>
                                    </div><!-- .buysell-field -->
                                    <div class="buysell-field form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="buysell-amount">Price</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right mx-3" style="margin-top: 19px;">
                                                <div class="text">USD</div>
                                            </div>
                                            <input type="number" class="form-control form-control-lg form-control-number" style="padding-right: 50px;"
                                                id="sell-amount" name="sell_price" value="" placeholder="0.00" autocomplete="off">
                                        </div>
                                        @if (session()->get('sell_method') == 'external')
                                        <div class="form-note-group">
                                            <span class="buysell-min form-note-alt">
                                                Note : A 5% Service Fee Applies
                                            </span>
                                        </div>
                                        @endif
                                    </div><!-- .buysell-field -->
                                    <div class="buysell-field form-action">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary"
                                            >Continue to Sell</button>
                                    </div><!-- .buysell-field -->
                                    <div class="buysell-field form-action">
                                        <a href="{{ route('customer.buy-sell') }}"
                                            class="btn btn-lg btn-block btn-warning"><em class="ni ni-arrow-left"></em>
                                            Back</a>
                                    </div><!-- .buysell-field -->
                                </form><!-- .buysell-form -->
                            </div><!-- .buysell-block -->
                        
                </div><!-- .buysell -->
            </div>
        </div>
    </div>
@endsection
@push('script')
    {!! $validator->selector('#sell-form') !!}

    <script>
        $(document).ready(function() {

            $('#sell-form').on('submit', function(e) {

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