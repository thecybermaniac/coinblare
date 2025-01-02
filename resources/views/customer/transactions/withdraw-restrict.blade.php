@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-sm mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered p-4 mt-5">
                            <center>
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-na bg-warning"></em>
                                    <h4 class="nk-modal-title">
                                        <em class="ni ni-sign-dollar"></em>
                                        {{ request()->session()->get('amount') }}
                                        Withdrawal Pending!
                                    </h4>
                                    <div class="nk-modal-text">
                                        <p class="caption-text">Dear Customer, due to our anti-fraud policy, you can't
                                            withdraw your funds yet due to lack of credibility.
                                            You are required to deposit 50 dollars into your account as anti-fraud
                                            insurrence. If your account is verified to be fraud free, you will
                                            be able to withdraw your funds, including your insurrance fund. We are sorry for
                                            any inconviences. Our policy is protect our users from any form of fraudalent
                                            activity.
                                        </p>
                                    </div>
                                    <div class="nk-modal-action-lg">
                                        <ul class="btn-group gx-4">
                                            <li>
                                                <a href="{{ route('customer.withdrawal.anti-fraud.pay') }}"
                                                    class="btn btn-lg btn-mw btn-primary">
                                                    I understand and want to proceed with the payment.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.dashboard') }}"
                                                    class="btn btn-lg btn-mw btn-primary">
                                                    Go back to dashboard
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
@endsection
