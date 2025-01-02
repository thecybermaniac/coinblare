@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-sm mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Account Deposit</h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <form class="nk-stepper stepper-init is-alter" action="{{ route('customer.deposit.process') }}" method="POST" id="stepper-two-factor-auth">
                                @csrf
                                <div class="card-inner">
                                    <div class="nk-stepper-content">
                                        <div class="nk-stepper-steps stepper-steps">
                                            <div class="nk-stepper-step">
                                                <h5 class="title mb-3">Make A Deposit</h5>
                                                <ul class="row g-3">
                                                    <div class="col-12">
                                                        <div class="buysell-field form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label" style="font-size: 23px;"
                                                                    for="buysell-amount">Amount</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="number"
                                                                    class="form-control form-control-lg form-control-number"
                                                                    id="buysell-amount" name="amount"
                                                                    placeholder="0.00" autocomplete="off">
                                                                <div class="form-dropdown">
                                                                    <div class="text">USD</div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .buysell-field -->
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                            <li class="step-next"><button type="submit" class="btn btn-primary" disabled
                                                    id="continue-buy">Continue</button></li>
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
