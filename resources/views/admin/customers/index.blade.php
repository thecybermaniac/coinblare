@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Customers List</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have total {{ $customers->count() }} customer(s).</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    @if ($customers->count() < 1) <div class="card-inner">
                        <center>
                            <div class="icon icon-circle-xxl">
                                <em class="ni ni-user-cross"></em>
                            </div>
                            <h5 class="">You don't have any customers yet, but soon.</h5>
                        </center>
                </div>
                @else
                <div class="card-inner-group">
                    <div class="card-inner p-0">
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
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Total Balance</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Withhdrawalable</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
                                <div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
                            </div><!-- .nk-tb-item -->
                            @foreach ($customer as $user)
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
                                                <span class="tb-lead text-capitalize">{{ $user->name }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <span class="sub-text">{{ $user->email }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="sub-text">{{ $user?->phone }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="sub-text">{{ number_format($user->balance, 2) }} USD</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <div class="icon-text">
                                        <span class="sub-text">{{ number_format($user?->withdrawalable, 2) }}</span>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-status text-capitalize @if ($user->status == 'active') text-success
                                        @else
                                            text-danger @endif">{{ $user->status }}</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.customers.detail', $user->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Details">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                        </li>
                                        @if ($user->status == 'active')
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.customers.suspend', $user->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Suspend">
                                                <em class="icon ni ni-cross-fill-c"></em>
                                            </a>
                                        </li>
                                        @else
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.customers.reactive', $user->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Reactive">
                                                <em class="icon ni ni-check-circle-fill"></em>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('admin.customers.detail', $user->id) }}"><em class="icon ni ni-eye"></em><span>View
                                                                    Details</span></a></li>
                                                        @if ($user->status == 'active')
                                                        <li><a href="{{ route('admin.customers.suspend', $user->id) }}"><em class="icon ni ni-cross-fill-c"></em><span>Suspend</span></a>
                                                        </li>
                                                        @else
                                                        <li><a href="{{ route('admin.customers.reactive', $user->id) }}"><em class="icon ni ni-check-circle-fill"></em><span>Reactive</span></a>
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
                                {{ $customer->links() }}
                            </div>
                            <div class="g">
                                <div>
                                    <div>PAGE {{ $customer->currentPage() }} of {{ $customer->lastPage() }}</div>
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
