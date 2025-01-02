@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none mb-5" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Transaction Detail</h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li><span class="text-base">{{ $tranx->created_at }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('customer.transaction-history') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('customer.transaction-history') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="html/invoice-print.html" target="_blank" data-bs-toggle="tooltip" title="Download Detail"><em class="icon ni ni-download"></em></a>
                        </div><!-- .invoice-actions -->
                        <div class="invoice-wrap">
                            <div class="invoice-brand text-center">
                                <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                            </div>
                            <div class="invoice-head">
                                <div class="invoice-contact">
                                    <span class="overline-title">Transaction</span>
                                    <div class="invoice-contact-info">
                                        <h4 class="title text-capitalize">{{ $tranx->crypto }} @if ($tranx->method == "sell") Sale @endif @if ($tranx->method == "Buy") Purchase @endif @if ($tranx->method == "transfer") Transfer @endif</h4>
                                        <ul class="list-plain">
                                            <li><span>Unit:</span><span class="mx-2">{{ number_format($tranx->amount, 10) }} {{ $tranx->abbr }}</li>
                                            <li><span>Price:</span><span class="mx-2">{{ number_format($tranx->price, 2) }} USD</span></li>
                                            <li><span>Status:</span><span class="mx-2 text-capitalize @if ($tranx->status == "successful" || $tranx->status == "sold")
                                                text-success
                                            @else
                                                text-danger
                                            @endif">{{ $tranx->status }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-desc">
                                    <ul class="list-plain">
                                        <li class="invoice-id"><span>Transaction ID</span>:<span>{{ $tranx->id }}</span></li>
                                        <li class="invoice-date"><span>Date</span>:<span>{{ $tranx->created_at->toFormattedDateString() }}</span></li>
                                    </ul>
                                </div>
                            </div><!-- .invoice-head -->
                        </div><!-- .invoice-wrap -->
                    </div><!-- .invoice -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection