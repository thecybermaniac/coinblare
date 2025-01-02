@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid d-none mt-5 mb-5" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto mt-5">
                    <div class="buysell-title text-center">
                        <h3 class="title text-capitalize" style="font-family: Georgia;">Send / Transfer Crypto</h3>
                    </div><!-- .buysell-title -->
                    <div class="buysell-block mt-5">
                        <form action="{{ route('customer.transfer_process') }}" id="transfer_form" method="POST"
                            class="buysell-form">
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
                                    <label class="form-label" for="buysell-amount">Amount to Send &#40;In USD&#41;</label>
                                </div>
                                <div class="form-control-group">
                                    <input type="number" class="form-control form-control-lg form-control-number"
                                        id="buysell-amount" name="amount" placeholder="0.00" autocomplete="off">
                                    <div class="form-dropdown">
                                        <div class="text">USD</div>
                                    </div>
                                </div>
                            </div><!-- .buysell-field -->
                            <div class="buysell-field form-group">  
                                <div class="form-label-group">
                                    <label class="form-label" for="buysell-amount">Reciepient's Cryptobot ID</label>
                                </div>
                                <div class="form-control-group">
                                    <input type="text" class="form-control form-control-lg form-control-number text-small"
                                        id="buysell-amount" name="rec_crypto_id" placeholder="example@example.com" autocomplete="off">
                                        <div class="form-dropdown">
                                            <div class="text"><em class="ni ni-user"></em></div>
                                        </div>
                                </div>
                            </div><!-- .buysell-field -->
                            <div class="buysell-field form-group">  
                                <div class="form-label-group">
                                    <label class="form-label" for="buysell-amount">Your Password</label>
                                </div>
                                <div class="form-control-group">
                                    <input type="password" class="form-control form-control-lg form-control-number"
                                        id="buysell-amount" name="password" placeholder="********">
                                        <div class="form-dropdown">
                                            <div class="text"><em class="ni ni-lock"></em></div>
                                        </div>
                                </div>
                            </div><!-- .buysell-field -->
                            <div class="buysell-field form-action">
                                <button type="submit" class="btn btn-lg btn-block btn-warning">Transfer</button>
                            </div><!-- .buysell-field -->
                        </form><!-- .buysell-form -->
                    </div><!-- .buysell-block -->
                </div>
            </div>
        </div><!-- .buysell -->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            $('#transfer_form').on('submit', function(e) {

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
