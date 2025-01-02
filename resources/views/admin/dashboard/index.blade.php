@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crypto Dashboard</h3>
                        <div class="nk-block-des text-soft">
                            <p>Welcome to Admin Crypto Dashboard.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-xxl-12">
                        <div class="row g-gs">
                            <div class="col-lg-7 col-xxl-12">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title">Total Revenue</h6>
                                            </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Revenue"></em>
                                            </div>
                                        </div>
                                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                                <div class="nk-sale-data">
                                                    <span class="amount">{{ number_format($revenue, 2) }} <small class="currency currency-usd text-primary">USD</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-5 col-xxl-12">
                                <div class="row g-gs">
                                    <div class="col-sm-12 col-lg-12 col-xxl-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Crypto Deposit Revenue</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from crypto buys"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount">{{ number_format($deposit->sum('value'), 2)}} <small class="currency currency-usd text-primary">USD</small></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-12 col-lg-12 col-xxl-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">External Wallet Sale Revenue</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from crypto sells"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount">{{ number_format($sell->sum('price'), 2)}} <small class="currency currency-usd text-primary">USD</small></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-12 col-lg-12 col-xxl-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Cash Deposit Revenue</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from crypto sells"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                    <div class="nk-sale-data">
                                                        <span class="amount">{{ number_format($rev->sum('total_revenue'), 2)}} <small class="currency currency-usd text-primary">USD</small></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .col -->
                    <div class="col-xxl-8">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Users Overview</h6>
                                        <p>How have your users trended.</p>
                                    </div>
                                </div>
                                <div class="analytic-ov">
                                    <div class="analytic-data-group analytic-ov-group g-3">
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Users</div>
                                            <div class="amount">{{ $users->count() }} <em class="ni ni-user"></em></div>
                                        </div>
                                    </div>
                                    <div class="analytic-ov-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas class="analytics-line-large chartjs-render-monitor" id="analyticOvData" width="476" height="140" style="display: block; height: 175px; width: 595px;"></canvas>
                                    </div>
                                    <div class="chart-label-group ms-5">
                                        <div class="chart-label">01 Jan, 2020</div>
                                        <div class="chart-label d-none d-sm-block">15 Jan, 2020</div>
                                        <div class="chart-label">30 Jan, 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-4">
                        <div class="card card-bordered card-full">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">New Users</h6>
                                        </div>
                                    </div>
                                </div>
                                @if ($users->count() < 1)
                                <div class="card-inner">
                                    <center>
                                        <div class="icon icon-circle-xxl">
                                            <em class="ni ni-user-cross"></em>
                                        </div>
                                        <h5>No new users.</h5>
                                    </center>
                                </div> 
                                @else
                                @foreach ($users as $user)
                                <div class="card-inner card-inner-md">
                                    <div class="user-card">
                                        <div class="user-info">
                                            <span class="lead-text text-capitalize">{{ $user->name }}</span>
                                            <span class="sub-text">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach 
                                @endif
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection