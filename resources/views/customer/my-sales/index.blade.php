@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">My Sales</h3>
                            <div class="nk-block-des text-soft">
                                <p>Sales History Overview</p>
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
                                                    <span>Cryptocurrency</span>
                                                </span>
                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                    <span class="d-md-none">Date</span>
                                                    <span class="d-none d-md-block">
                                                        <span>Unit</span>
                                                    </span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-amount is-alt">
                                                <span class="tb-tnx-total">&nbsp;&nbsp; Price</span>
                                                <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                            </th>
                                        </tr><!-- tb-tnx-item -->
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>{{ $sale->id }}</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title text-capitalize">{{ $sale->crypto }}</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">{{ number_format($sale->amount, 10) }}
                                                            {{ $sale->abbr }}</span>
                                                        <span
                                                            class="date">{{ $sale->created_at->toFormattedDateString() }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount is-alt">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount"><em
                                                                class="ni ni-sign-dollar"></em>{{ number_format($sale->price, 2) }}</span>
                                                    </div>
                                                    <div class="tb-tnx-status text-capitalize">
                                                        <span
                                                            class="badge badge-dot @if ($sale->status == 'sold') bg-success @else bg-warning @endif">{{ $sale->status }}</span>
                                                    </div>
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                {{ $sales->links() }}
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
