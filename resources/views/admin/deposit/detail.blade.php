@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title text-capitalize">Crypto Deposit Details</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="{{ route('admin.crypto-deposit')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="{{ route('admin.crypto-deposit')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-xl-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <img src="{{ asset('uploads/'.$deposit->proof) }}" class="card-img-top" alt="deposit proof">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block">
                                        <div class="row g-gs">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="name">Customer</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg text-capitalize border-0" value="{{ $deposit->user->name }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="value">Customer Email</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg border-0" value="{{ $deposit->user->email }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="r_value">Crypto</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg text-capitalize border-0" value="{{ $deposit->crypto }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="address">Amount</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg border-0" value="{{ $deposit->amount }} {{ $deposit->abbr }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="cap">Wallet Address</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg border-0" value="{{ $deposit->address }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="cap">Date Deposited</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg border-0" value="{{ $deposit->created_at->toFormattedDateString() }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="abbr">Status</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg text-capitalize border-0" value="{{ $deposit->status }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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