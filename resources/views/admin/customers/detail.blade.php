@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Customer Details</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="{{ route('admin.customers') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="{{ route('admin.customers') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-xl-4">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="user-card user-card-s2">
                                        <div class="user-info">
                                            <div class="badge bg-light rounded-pill ucap">Customer</div>
                                            <h5>{{ $user->name }}</h5>
                                            <span class="sub-text">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner card-inner-sm">
                                    <ul class="btn-toolbar justify-center gx-1">
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-shield-off"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-bookmark"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a></li>
                                    </ul>
                                </div>
                                <div class="card-inner">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <div class="profile-stats">
                                                <span class="amount">{{ $wallet->count() }}</span>
                                                <span class="sub-text">Wallets</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-stats">
                                                <span class="amount">{{ $tranx->count() }}</span>
                                                <span class="sub-text">Transactions</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <h6 class="overline-title mb-2">Short Details</h6>
                                    <div class="row g-3">
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">User ID:</span>
                                            <span>#{{ $user->id }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Billing Email:</span>
                                            <span>{{ $user->email }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Last Login:</span>
                                            <span>{{ $user->updated_at->toFormattedDateString() }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Status:</span>
                                            <span class="lead-text text-success text-capitalize">{{ $user->status }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Register At:</span>
                                            <span>{{ $user->created_at->toFormattedDateString() }}</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-xl-8">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <div class="overline-title-alt mb-2 mt-2">In Account</div>
                                    <div class="profile-balance">
                                        <div class="profile-balance-group gx-4">
                                            <div class="profile-balance-sub">
                                                <div class="profile-balance-amount">
                                                    <div class="number">{{ number_format($user->withdrawalable, 2) }} <small class="currency currency-usd">USD</small></div>
                                                </div>
                                                <div class="profile-balance-subtitle">Account Balance</div>
                                            </div>
                                            <div class="profile-balance-sub">
                                                <span class="profile-balance-plus text-soft"><em class="icon ni ni-minus"></em></span>
                                                <div class="profile-balance-amount">
                                                    <div class="number">{{ number_format($user->balance, 2) }}</div>
                                                </div>
                                                <div class="profile-balance-subtitle">Wallet Balance</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <h6 class="lead-text mb-3">Wallets</h6>
                                    <div class="row g-3">
                                        @if ($wallet->count() < 1)
                                            <div class="col-12">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <h5 class="card-title text-center" style="font-family: Courier New; font-style: italic;">No Wallets!</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @foreach ($wallet as $w)
                                            <div class="col-12 col-lg-6 col-xl-12">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <div class="icon-circle icon-circle-lg bg-transparent">
                                                                    <img src="{{ asset('uploads/'.$w->wallet_symbol) }}" alt="{{ $w->crypto_wallet }}">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h6 class="lead-text text-capitalize">{{ $w->crypto_wallet }} wallet</h6>
                                                                    <span class="sub-text">{{ round($w->balance_in_crypto, 3) }} {{ $w->abbr }} <span><em class="ni ni-equal"></em></span> {{ number_format($w->balance_in_currency, 2) }} USD</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                            @endforeach
                                        @endif
                                    </div><!-- .row -->
                                </div>
                            </div><!-- .card-inner -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection