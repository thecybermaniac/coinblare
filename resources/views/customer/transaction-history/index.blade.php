@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Your Transaction History</h3>
                            <div class="nk-block-des text-soft">
                                <p>See full list of your transactions in your account</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <table class="table table-tranx">
                                    <thead>
                                        <tr class="tb-tnx-head">
                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                    <span>Transaction</span>
                                                </span>
                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                    <span class="d-md-none">Date</span>
                                                    <span class="d-none d-md-block">
                                                        <span>Amount</span>
                                                    </span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-amount is-alt">
                                                <span class="tb-tnx-total">&nbsp;&nbsp; Price</span>
                                                <span class="tb-tnx-status d-none d-md-inline-block"></span>
                                            </th>
                                        </tr><!-- tb-tnx-item -->
                                    </thead>
                                    <tbody>
                                        @foreach ($tranx as $t)
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>{{ $t->id }}</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title text-capitalize">{{ $t->method }}
                                                            {{ $t->crypto }}</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">{{ number_format($t->amount, 10) }}
                                                            {{ $t->abbr }}</span>
                                                        <span
                                                            class="date">{{ $t->created_at->toFormattedDateString() }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount is-alt">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount"><em
                                                                class="ni ni-sign-dollar"></em>{{ number_format($t->price, 2) }}</span>
                                                    </div>
                                                    <div class="tb-tnx-status text-capitalize">
                                                        <a href="{{ route('customer.transaction-history.detail', $t->id) }}"
                                                            class="btn btn-icon btn-trigger" data-bs-toggle="tooltip"
                                                            title="View Full Detail">
                                                            <em class="icon ni ni-eye"></em>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                <div class="gs">
                                    {{ $tranx->links() }}
                                </div>
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
