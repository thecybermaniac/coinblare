@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-sm mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered p-4 mt-5">
                            @if (request()->session()->get('s-mzg') == 'buy')
                                <center>
                                    <div class="nk-modal">
                                        <em
                                            class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                        <h4 class="nk-modal-title">Purchase Successful!</h4>
                                        <div class="nk-modal-text">
                                            <p class="caption-text">Purchase of {{ request()->session()->get('price') }}
                                                {{ request()->session()->get('crypto_abbr') }} was successful and has been
                                                added to your {{ Str::ucfirst(request()->session()->get('crypto')) }}
                                                wallet.</p>
                                        </div>
                                        <div class="nk-modal-action-lg">
                                            <ul class="btn-group gx-4">
                                                <li><a href="{{ route('customer.dashboard') }}"
                                                        class="btn btn-lg btn-mw btn-primary">OK</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </center>
                            @else
                                @if (request()->session()->get('s-mzg') == 'cryptobot')
                                    <center>
                                        <div class="nk-modal">
                                            <em
                                                class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                            <h4 class="nk-modal-title">Successfully Published!</h4>
                                            <div class="nk-modal-text">
                                                <p class="caption-text">Your trade has been published into our sales-order
                                                    database and {{ request()->session()->get('sell_amount') }}
                                                    {{ request()->session()->get('crypto_abbr') }}
                                                    has been deducted from your <span
                                                        class="text-capitalize">{{ request()->session()->get('crypto') }}</span>
                                                    wallet.</p>
                                            </div>
                                            <div class="nk-modal-action-lg">
                                                <ul class="btn-group gx-4">
                                                    <li><a href="{{ route('customer.dashboard') }}"
                                                            class="btn btn-lg btn-mw btn-primary">OK</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </center>
                                @else
                                    <center>
                                        <div class="nk-modal">
                                            <em
                                                class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                            <h4 class="nk-modal-title">Successfully Submitted!</h4>
                                            <div class="nk-modal-text">
                                                <p class="caption-text">Your trade has been submitted and will be published
                                                    to our sales-order database once your payment is approved.</p>
                                            </div>
                                            <div class="nk-modal-action-lg">
                                                <ul class="btn-group gx-4">
                                                    <li><a href="{{ route('customer.dashboard') }}"
                                                            class="btn btn-lg btn-mw btn-primary">OK</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </center>
                                @endif
                            @endif
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
@endsection
