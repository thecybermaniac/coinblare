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
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                    <h4 class="nk-modal-title">Oops! Server Error.</h4>
                                    <div class="nk-modal-text">
                                        <p class="caption-text">Something went wrong while we were processing your
                                            withdrawal, please try again later. For more contact support at:
                                            <a href="mailto:example@example.com">example@example.com</a>.
                                        </p>
                                    </div>
                                    <div class="nk-modal-action-lg">
                                        <ul class="btn-group gx-4">
                                            <li>
                                                <a href="{{ route('customer.dashboard') }}"
                                                    class="btn btn-lg btn-mw btn-primary">
                                                    <span>Go to Dashboard</span>
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
