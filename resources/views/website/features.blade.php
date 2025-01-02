@extends('website.master')

@section('content')
    <section class="section section-service pb-3 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title text-uppercase text-center border-bottom" style="font-family: Cambria;">features</h2>
                </div>
            </div>
            <div class="row g-4 mt-5 mb-5 justify-content-center">
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="card-inner">
                            <div class="text-center">
                                <img src="{{ asset('images/easy.png') }}" alt="image" width="100">
                            </div>
                            <h4 class="card-title text-center">Easy to Use</h4>
                            <p class="card-text text-center">With our user-friendly interface, trading is very convenient
                                both for experts and beginners.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="card-inner">
                            <div class="text-center">
                                <img src="{{ asset('images/sell.png') }}" alt="image" width="100">
                            </div>
                            <h4 class="card-title text-center">Instant Sale</h4>
                            <p class="card-text text-center">Crypto sellers have nothing to worry about. We help our
                                customers sell their cryptocurrencies. All you have to do is just sell and continue selling.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="card-inner">
                            <div class="text-center">
                                <img src="{{ asset('images/gift.png') }}" alt="image" width="100">
                            </div>
                            <h4 class="card-title text-center">Monthly Bonuses</h4>
                            <p class="card-text text-center">Crypto trading doesn't have to be boring. You can get rewarded
                                for doing what you love. We give up to 1,000 USD monthly to our esteemed users.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="card-inner">
                            <div class="text-center">
                                <img src="{{ asset('images/security.png') }}" alt="image" width="100">
                            </div>
                            <h4 class="card-title text-center">Top Security</h4>
                            <p class="card-text text-center">Your security is our priority. With our blockchain encryption
                                systems to protect your account and transactions, you have nothing to worry about.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="card-inner">
                            <div class="text-center">
                                <img src="{{ asset('images/refer.png') }}" alt="image" width="100">
                            </div>
                            <h4 class="card-title text-center">Refer Us And Earn</h4>
                            <p class="card-text text-center">Get rewarded for spreading the goodnews. Get 50 USD every time
                                someone registers with your promocode.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
