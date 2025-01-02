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
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-more-h bg-warning"></em>
                                    <h4 class="nk-modal-title">Deposit Pending</h4>
                                    <div class="nk-modal-text">
                                        <p class="caption-text">Your deposit of {{ session()->get('amount') }}
                                            {{ session()->get('crypto_abbr') }} has been processed and will be added to your
                                            wallet balance once approved. This takes between 1 hour - 3 days. Thanks.</p>
                                    </div>
                                    <div class="nk-modal-action-lg">
                                        <ul class="btn-group gx-4">
                                            <li>
                                                <a href="{{ route('customer.dashboard') }}"
                                                    class="btn btn-lg btn-mw btn-primary">Ok
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
