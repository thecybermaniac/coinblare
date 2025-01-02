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
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                <h4 class="nk-modal-title">Successfully Transfered <em class="ni ni-sign-dollar"></em>{{ request()->session()->get('amount') }}!</h4>
                                <div class="nk-modal-text">
                                    <p class="caption-text">Your have successfully transfered {{ request()->session()->get('amount') }} worth of {{ request()->session()->get('abbr') }} to {{ request()->session()->get('reciever') }} and the same amount has been deducted from your {{ request()->session()->get('abbr') }} Wallet.</span>
                                        wallet.</p>
                                </div>
                                <div class="nk-modal-action-lg">
                                    <ul class="btn-group gx-4">
                                        <li>
                                            <a href="{{ route('customer.dashboard') }}"
                                                class="btn btn-lg btn-mw btn-primary">View Details
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