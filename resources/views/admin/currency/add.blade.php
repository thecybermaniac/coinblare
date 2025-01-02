@extends('admin.layout.master')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-sm mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Add Currency</h2>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <form class="nk-stepper stepper-init is-alter" action="{{ route('admin.currency.add_process') }}"
                                method="POST" id="stepper-two-factor-auth">
                                @csrf
                                <div class="card-inner">
                                    <div class="nk-stepper-content">
                                        <div class="nk-stepper-steps stepper-steps">
                                            <div class="nk-stepper-step">
                                                <ul class="row g-3">
                                                    <div class="col-12">
                                                        <div class="buysell-field form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label" style="font-size: 23px;"
                                                                    for="buysell-amount">Name</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text"
                                                                    class="form-control form-control-lg form-control-number"
                                                                    id="buysell-amount" name="name" placeholder="US Dollar"
                                                                    autocomplete="off">
                                                                <div class="form-dropdown">
                                                                    <div class="text"><em class="ni ni-flag"></em></div>
                                                                </div>
                                                            </div>
                                                            @error('name')
                                                                <i class="text-danger">{{ $message }}</i>
                                                            @enderror
                                                        </div><!-- .buysell-field -->
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="buysell-field form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label" style="font-size: 23px;"
                                                                    for="buysell-amount">Code</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text"
                                                                    class="form-control form-control-lg form-control-number"
                                                                    id="buysell-amount" name="code" placeholder="NGN"
                                                                    autocomplete="off">
                                                                <div class="form-dropdown">
                                                                    <div class="text"><em class="ni ni-coin"></em></div>
                                                                </div>
                                                            </div>
                                                            @error('code')
                                                                <i class="text-danger">{{ $message }}</i>
                                                            @enderror
                                                        </div><!-- .buysell-field -->
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="buysell-field form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label" style="font-size: 23px;"
                                                                    for="buysell-amount">Exchange Rate</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text"
                                                                    class="form-control form-control-lg form-control-number"
                                                                    id="buysell-amount" name="exchange_rate" placeholder="0.00"
                                                                    autocomplete="off">
                                                                <div class="form-dropdown">
                                                                    <div class="text">123</div>
                                                                </div>
                                                            </div>
                                                            @error('exchange_rate')
                                                                <i class="text-danger">{{ $message }}</i>
                                                            @enderror
                                                        </div><!-- .buysell-field -->
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                            <li class="step-next">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                <a href="{{ route('admin.currency.index') }}" class="btn btn-warning">Back</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
@endsection