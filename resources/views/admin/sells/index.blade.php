@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crypto Sales</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have total {{ $sale->count() }} sell(s).</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    @if ($sale->count() < 1) <div class="card-inner">
                        <center>
                            <div class="icon icon-circle-xxl">
                                <em class="ni ni-money"></em>
                            </div>
                            <h5>There are no sales yet, but soon.</h5>
                        </center>
                </div>
                @else
                <div class="card-inner-group">
                    <div class="card-inner p-2">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="cid" @if ($tranx->count() < 1) disabled @endif>
                                            <label class="custom-control-label" for="cid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Customer</span></div>
                                <div class="nk-tb-col tb-col-sm"><span class="sub-text">Email</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Crypto</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Sell Unit</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Sell Price</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Payment Address</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
                                <div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
                            </div><!-- .nk-tb-item -->
                            @foreach ($tranx as $t)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="{{ $t->id }}">
                                        <label class="custom-control-label" for="{{ $t->id }}"></label>
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
                                    <span class="sub-text">{{ round($t->amount, 3) }} {{ $t->abbr }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <div class="icon-text">
                                        <span class="sub-text">{{ number_format($t->price, 2) }} USD</span>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <div class="icon-text">
                                        <span class="sub-text">{{ $t->address }} USD</span>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-status text-capitalize @if ($t->status == 'sold') text-success @endif @if ($t->status == 'published') text-warning @endif @if ($t->status == 'pending') text-danger @endif">{{ $t->status }}</span>
                                </div>
                                @if ($t->status == 'pending' || $t->status == 'published')
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        @if ($t->status == 'pending')
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.crypto.sells.approve', $t->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                                <em class="icon ni ni-check-circle"></em>
                                            </a>
                                        </li>
                                        @endif
                                        @if ($t->status == 'published')
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.crypto.sells.buy', $t->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                                <em class="icon ni ni-bag"></em>
                                            </a>
                                        </li>
                                        @endif

                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-bag"></em><span>Buy</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endif
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
