@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title text-capitalize">Add Cryptocurrency</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="{{ route('admin.cryptos') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="{{ route('admin.cryptos')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-xl-2">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <img src="" class="card-img-top" alt="" id="imgPreview">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <form action="{{ route('admin.cryptos.add.process') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-gs">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="name">Crypto Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="name" class="form-control form-control-lg text-capitalize" name="name" placeholder="Crypto Name" value="{{ old('name') }}">
                                                    </div>
                                                    @error('name')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="value">Cryptobot Value</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="value" class="form-control form-control-lg text-capitalize" name="value" placeholder="Cryptobot Value" value="{{ old('value') }}">
                                                    </div>
                                                    @error('value')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="r_value">Real Value</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="r_value" class="form-control form-control-lg text-capitalize" name="r_value" placeholder="Real Value" value="{{ old('r_value') }}">
                                                    </div>
                                                    @error('r_value')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="address">Wallet Address</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="address" class="form-control form-control-lg text-capitalize" name="address" placeholder="Wallet Address" value="{{ old('address') }}">
                                                    </div>
                                                    @error('address')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="cap">Market Cap</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="cap" class="form-control form-control-lg text-capitalize" name="cap" placeholder="Market Cap" value="{{ old('cap') }}">
                                                    </div>
                                                    @error('cap')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="abbr">Crypto Abbreviation</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="abbr" class="form-control form-control-lg text-uppercase" name="abbr" placeholder="Crypto Abbreviation" value="{{ old('abbr') }}">
                                                    </div>
                                                    @error('abbr')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="img">Crypto Image</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="photo" accept="image/*" class="form-control form-control-lg form-control-file text-capitalize" name="img">
                                                    </div>
                                                    @error('img')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Add Crypto</button>
                                            </div>
                                        </div>
                                    </form>
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