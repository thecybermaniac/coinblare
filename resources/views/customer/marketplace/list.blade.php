@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 mb-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Marketplace Match</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Best Available Offer</p>
                                </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('customer.buy-sell') }}"
                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('customer.buy-sell')}}"
                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                    class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xl-12">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <div class="overline-title-alt mb-2 mt-2">In Offer</div>
                                        <div class="profile-balance">
                                            <div class="profile-balance-group gx-4">
                                                <div class="profile-balance-sub">
                                                    <div class="profile-balance-amount">
                                                        <div class="number"> <small class="currency currency-usd">{{ number_format($price, 10) }} {{ $crypto->abbr }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="profile-balance-subtitle">Unit Offer</div>
                                                </div>
                                                <div class="profile-balance-sub">
                                                    <span class="profile-balance-plus text-soft"><em
                                                            class="icon ni ni-minus"></em></span>
                                                    <div class="profile-balance-amount">
                                                        <div class="number"><em class="ni ni-sign-dollar"></em>{{ number_format(request()->session()->get('amount')) }}</div>
                                                    </div>
                                                    <div class="profile-balance-subtitle">Price</div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <span class="text-soft">Note: A 2% service fee applies</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <form action="{{ route('customer.payment') }}" method="POST">
                                            @csrf
                                        <div class="row g-3">
                                            <div class="col-12 col-lg-6 col-xl-12">
                                                <button
                                                    class="h-100 w-100 btn-dim btn btn-outline-primary border border-dashed round-sm p-4 d-flex align-items-center justify-content-center">
                                                    <span class="text-soft">Proceed to buy {{ number_format($price, 10) }} {{ $crypto->abbr }} for {{ number_format(request()->session()->get('amount')) }} USD</span>
                                                </button>
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                        </form>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Whoops!</strong> {{ session()->get('error') }}.
                    </div>
                    @endif
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
