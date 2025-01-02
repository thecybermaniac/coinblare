@extends('customer.layout.master')

@section('content')
@include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-sm mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title fw-normal">Account Withdrawal</h4>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <form class="nk-stepper stepper-init is-alter" method="POST" action="{{ route('customer.withdrawal.process') }}" id="stepper-two-factor-auth">
                                @csrf
                                <div class="card-inner">
                                    <div class="nk-stepper-content">
                                        <div class="nk-stepper-steps stepper-steps">
                                            <div class="nk-stepper-step">
                                                <ul class="row g-2">
                                                    <div class="col-12">
                                                        <div class="buysell-field form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label"
                                                                    for="withdraw-amount">Amount</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="number"
                                                                    class="form-control form-control-lg form-control-number text_field"
                                                                    id="withdraw-amount" name="amount"
                                                                    placeholder="0.00" autocomplete="off">
                                                                <div class="form-dropdown">
                                                                    <div class="text">USD</div>
                                                                </div>
                                                            </div>
                                                            @error('amount')
                                                            <i class="text-danger">{{ $message }}</i>
                                                        @enderror
                                                        </div><!-- .buysell-field -->
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="buysell-field form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label"
                                                                    for="withdraw-amount">Paypal ID</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text"
                                                                    class="form-control form-control-lg form-control-number text_field"
                                                                    id="withdraw-amount" name="paypal_id"
                                                                    placeholder="example@example.com" autocomplete="off">
                                                                    <div class="form-dropdown">
                                                                        <div class="text"><em class="ni ni-user"></em></div>
                                                                    </div>
                                                            </div>
                                                            @error('paypal_id')
                                                            <i class="text-danger">{{ $message }}</i>
                                                        @enderror
                                                        </div><!-- .buysell-field -->
                                                    </div>
                                                    <div class="buysell-field form-group">
                                                        <div class="form-label-group">
                                                            <label class="form-label"
                                                                for="withdraw-amount">Password</label>
                                                        </div>
                                                        <div class="form-control-group">
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-number text_field"
                                                                id="withdraw-amount" name="password" placeholder="********">
                                                                <div class="form-dropdown">
                                                                    <div class="text"><em class="ni ni-lock"></em></div>
                                                                </div>
                                                        </div>
                                                        @error('password')
                                                        <i class="text-danger">{{ $message }}</i>
                                                    @enderror
                                                    </div><!-- .buysell-field -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary p-2">
                                                                Withdraw
                                                            </button>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
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
