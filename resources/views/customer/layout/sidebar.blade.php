<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/crypto/index.html" class="nk-sidebar-logo">
                <img src="{{ asset('images/coinblare-logo.png') }}" alt="logo" width="140">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-widget d-none d-xl-block">
                    <div class="user-account-info between-center">
                        <div class="user-account-main">
                            <h6 class="overline-title-alt">
                                Account Balance
                                <span class="badge bg-transparent border-0" data-bs-toggle="tooltip"
                                    title="Your account balance, which is actual capital that can be spent and withdrawn.">
                                    <em class="icon ni ni-help"></em>
                                </span>
                            </h6>
                            <div class="user-balance">
                                {{ number_format(Auth::user()->withdrawalable, 2) }}
                                <small class="currency currency-btc">USD</small>
                            </div>
                            <div class="amount text-warning">
                                <span class="text-capitalize text-white text-bold"
                                    style="font-size: 18px; font-family:Cambria;">
                                    Wallet Balance :
                                </span>{{ number_format(Auth::user()->balance, 2) }}
                                <small class="currency currency-usd">USD</small>
                                <span class="badge bg-transparent border-0" data-bs-toggle="tooltip"
                                    title="Your wallet balance, which is total value of the cryptocurriencies in your wallets, that can be sold and withdrawn to a crypto wallet.">
                                    <em class="icon ni ni-help"></em>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="user-account-actions">
                        <ul class="g-3">
                            <li>
                                <a href="{{ route('customer.deposit') }}" class="btn btn-lg btn-primary">
                                    <span>Deposit</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer.withdrawal') }}" class="btn btn-lg btn-warning">
                                    <span>Withdraw</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .nk-sidebar-widget -->
                <div class="nk-sidebar-menu">
                    <!-- Menu -->
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">Menu</h6>
                        </li>
                        <li class="nk-menu-item {!! getRoute('customer.dashboard') !!}">
                            <a href="{{ route('customer.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-dashboard"></em>
                                </span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {!! getRoute('customer.wallets') !!}">
                            <a href="{{ route('customer.wallets') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-wallet-alt"></em>
                                </span>
                                <span class="nk-menu-text">Wallets</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {!! getRoute(['customer.buy-sell-select', 'customer.buy-sell']) !!}">
                            <a href="{{ route('customer.buy-sell-select') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-coins"></em>
                                </span>
                                <span class="nk-menu-text">Buy / Sell</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {!! getRoute(['customer.transaction-history', 'customer.transaction-history.detail']) !!}">
                            <a href="{{ route('customer.transaction-history') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-tranx"></em>
                                </span>
                                <span class="nk-menu-text">Transaction History</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {!! getRoute('customer.profile') !!}">
                            <a href="{{ route('customer.profile') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-account-setting"></em>
                                </span>
                                <span class="nk-menu-text">My Profile</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {!! getRoute('customer.my-sales') !!}">
                            <a href="{{ route('customer.my-sales') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-bag"></em>
                                </span>
                                <span class="nk-menu-text">My Sales</span>
                            </a>
                        </li>
                        <li class="nk-menu-item {!! getRoute('customer.market-analysis') !!}">
                            <a href="{{ route('customer.market-analysis') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-bar-chart"></em>
                                </span>
                                <span class="nk-menu-text">Market Analysis</span>
                            </a>
                        </li>
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">User</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-signout"></em>
                                </span>
                                <span class="nk-menu-text">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
