<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="nk-sidebar-logo">
                <img src="{{ asset('images/coinblare-logo.png') }}" width="140" alt="logo">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        <li class="nk-menu-item {!! getRoute('admin.dashboard') !!}">
                            <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-sign-btc"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute(['admin.customers', 'admin.customers.detail']) !!}">
                            <a href="{{ route('admin.customers') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Customers</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute(['admin.cryptos', 'admin.cryptos.edit']) !!}">
                            <a href="{{ route('admin.cryptos') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">Cryptos</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute('admin.crypto.buys') !!}">
                            <a href="{{ route('admin.crypto.buys') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-bag"></em></span>
                                <span class="nk-menu-text">Buys</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute('admin.crypto.sells') !!}">
                            <a href="{{ route('admin.crypto.sells') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-curve-up-right"></em></span>
                                <span class="nk-menu-text">Sells</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute(['admin.crypto-deposit', 'admin.crypto-deposit.detail']) !!}">
                            <a href="{{ route('admin.crypto-deposit')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-arrow-up"></em></span>
                                <span class="nk-menu-text">Deposits</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute('admin.transactions') !!}">
                            <a href="{{ route('admin.transactions') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                <span class="nk-menu-text">Transactions</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item {!! getRoute('admin.market-analysis') !!}">
                            <a href="{{ route('admin.market-analysis') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-bar-chart"></em></span>
                                <span class="nk-menu-text">Market Analysis</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Admin</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item {!! getRoute('admin.settings') !!}">
                            <a href="{{ route('admin.settings') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                <span class="nk-menu-text">Settings</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="{{ route('logout') }}" class="nk-menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                <span class="nk-menu-text">Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li><!-- .nk-menu-item -->
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
