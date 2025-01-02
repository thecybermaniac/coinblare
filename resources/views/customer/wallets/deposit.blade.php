@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-sm mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-xl">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal text-center" style="font-family: Georgia;">Deposit
                                {{ request()->session()->get('amount') }}
                                {{ request()->session()->get('crypto_abbr') }}
                        </div>
                    </div><!-- .nk-block-head -->
                    <center>
                        <div class="nk-block nk-block-lg">
                            <h4 class="title text-capitalize p-2" style="font-family: 'Courier;">
                                {{ request()->session()->get('crypto') }} wallet address</h4>
                            <div class="card card-bordered w-50" style="background-color: white;">
                                <div class="card-body p-5 text-center">
                                    {!! QrCode::size(300)->backgroundColor(255, 255, 255)->generate($crypto->address) !!}
                                </div>
                            </div>
                            <div class="nk-refwg-url mt-3 mb-1">
                                <div class="form-control-wrap">
                                    <div class="form-clip clipboard-init mt-2" data-clipboard-target="#refUrl"
                                        data-success="Copied" data-text="Copy Address"><em
                                            class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy
                                            Address</span></div>
                                    <input type="text" readonly class="form-control copy-text p-3" id="refUrl"
                                        value="{{ $crypto->address }}">
                                </div>
                            </div>
                            <div class="buysell-field form-action text-center">
                                <div>
                                    <a class="btn btn-primary btn-lg" data-bs-dismiss="modal" data-bs-toggle="modal"
                                        href="#proof">I have made the deposit</a>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </center>
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
    <div class="modal fade zoom" tabindex="-1" role="dialog" id="proof">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <div class="nk-block-head nk-block-head-xs text-center">
                        <h5 class="nk-block-title">I have made the deposit</h5>
                    </div>
                    @livewire('cryptodeposit')
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
@endsection
