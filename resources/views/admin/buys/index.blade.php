@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crypto Buys</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have total {{ $buy->count() }} buy order(s).</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    @if ($buy->count() < 1) <div class="card-inner">
                        <center>
                            <div class="icon icon-circle-xxl">
                                <em class="ni ni-coin-alt"></em>
                            </div>
                            <h5>There are no purchases yet, but soon.</h5>
                        </center>
                </div>
                @else
                <div class="card-inner-group">
                    <div class="card-inner p-2">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="cid">
                                        <label class="custom-control-label" for="cid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Customer</span></div>
                                <div class="nk-tb-col tb-col-sm"><span class="sub-text">Email</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Crypto</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Buy Unit</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Buy Price</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
                            </div><!-- .nk-tb-item -->
                            @foreach ($tranx as $t)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="cid1">
                                        <label class="custom-control-label" for="cid1"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col">
                                    <a href="html/customer-details.html">
                                        <div class="user-card">
                                            <div class="user-name">
                                                <span class="tb-lead text-capitalize">{{ $t->user->name }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <span class="sub-text">{{ $t->user->email }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="sub-text text-capitalize">{{ $t->crypto }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="sub-text">{{ number_format($t->amount, 10) }} {{ $t->abbr }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <div class="icon-text">
                                        <span class="sub-text">{{ number_format($t->price, 2) }}</span>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-status text-capitalize @if ($t->status == " successful") text-success @else text-danger @endif">{{ $t->status }}</span>
                                </div>
                            </div><!-- .nk-tb-item -->
                            @endforeach
                        </div><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-block-between-md g-3">
                            <div class="g">
                                {{ $tranx->links() }}
                            </div>
                            <div class="g">
                                <div>
                                    <div>PAGE {{ $tranx->currentPage() }} of {{ $tranx->lastPage() }}</div>
                                </div>
                            </div><!-- .pagination-goto -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
                @endif
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
</div>
</div>
@endsection
