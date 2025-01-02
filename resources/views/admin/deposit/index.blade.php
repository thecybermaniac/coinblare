@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crypto Deposits</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have total {{ $dep->count() }} deposit(s).</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    @if ($dep->count() < 1) <div class="card-inner">
                        <center>
                            <div class="icon icon-circle-xxl">
                                <em class="ni ni-na"></em>
                            </div>
                            <h5>There are no deposits yet, but soon.</h5>
                        </center>
                </div>
                @else
                <div class="card-inner-group">
                    <div class="card-inner p-2">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="cid" @if ($dep->count() < 1) disabled @endif>
                                            <label class="custom-control-label" for="cid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Customer</span></div>
                                <div class="nk-tb-col tb-col-sm"><span class="sub-text">Email</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Crypto</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Amount</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Wallet Address</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
                                <div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
                            </div><!-- .nk-tb-item -->
                            @foreach ($deposit as $d)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="{{ $d->id }}">
                                        <label class="custom-control-label" for="{{ $d->id }}"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col">
                                    <a href="html/customer-details.html">
                                        <div class="user-card">
                                            <div class="user-name">
                                                <span class="tb-lead text-capitalize">{{ $d->user->name }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <span class="sub-text">{{ $d->user->email }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="sub-text text-capitalize">{{ $d->crypto }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="sub-text">{{ number_format($d->amount, 10) }}
                                        {{ $d->abbr }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <div class="icon-text">
                                        <span class="sub-text">{{ $d->address }}</span>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-status text-capitalize @if ($d->status == 'approved') text-success @else text-danger @endif">{{ $d->status }}</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.crypto-deposit.detail', $d->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                        </li>
                                        @if ($d->status == 'pending' || $d->status == 'declined')
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.crypto-deposit.approve', $d->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
                                                <em class="icon ni ni-check-circle"></em>
                                            </a>
                                        </li>
                                        @endif
                                        @if ($d->status == 'pending')
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.crypto-deposit.decline', $d->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Decline">
                                                <em class="icon ni ni-na"></em>
                                            </a>
                                        </li>
                                        @endif
                                        @if ($d->status == 'approved')
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.crypto-deposit.cancel', $d->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Approval">
                                                <em class="icon ni ni-cross-circle"></em>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="{{ route('admin.crypto-deposit.detail', $d->id) }}">
                                                                <em class="icon ni ni-eye-fill"></em>
                                                                <span>View</span>
                                                            </a>
                                                        </li>
                                                        @if ($d->status == 'pending')
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-check-circle"></em>
                                                                <span>Approve</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-na"></em>
                                                                <span>Decline</span>
                                                            </a>
                                                        </li>
                                                        @else
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-cross-circle"></em>
                                                                <span>Cancel Approval</span>
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                            @endforeach
                        </div><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-block-between-md g-3">
                            <div class="g">
                                {{ $deposit->links() }}
                            </div>
                            <div class="g">
                                <div>
                                    <div>PAGE {{ $deposit->currentPage() }} of {{ $deposit->lastPage() }}</div>
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
