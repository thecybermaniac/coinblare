@extends('website.master')

@section('content')
<section class="section section-service pb-3 pt-5">
    <div class="container">
        <div class="section-content">
            <center>
                <div class="row justify-content-center text-center">
                    <div class="col-md-3 text-center">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                {
                                    "symbol": "BITSTAMP:BTCUSD",
                                    "width": "100%",
                                    "colorTheme": "light",
                                    "isTransparent": false,
                                    "locale": "en"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                    <div class="col-md-3">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                {
                                    "symbol": "BINANCE:ETHUSD",
                                    "width": "100%",
                                    "colorTheme": "light",
                                    "isTransparent": false,
                                    "locale": "en"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                    <div class="col-md-3">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                {
                                    "symbol": "BINANCE:BNBUSD",
                                    "width": "100%",
                                    "colorTheme": "light",
                                    "isTransparent": false,
                                    "locale": "en"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                    <div class="col-md-3">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                {
                                    "symbol": "BITSTAMP:XRPUSD",
                                    "width": "100%",
                                    "colorTheme": "light",
                                    "isTransparent": false,
                                    "locale": "en"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </center>
        </div>
    </div><!-- .container -->
</section><!-- .section -->
<section class="section section-feature pb-0 bg-lighter" id="feature">
    <div class="container">
        <div class="row flex-row-reverse align-items-center justify-content-between g-gs">
            <div class="col-lg-5">
                <div class="img-block img-block-s1 right mb-5">
                    <img src="{{ asset('images/btc.png') }}" alt="img">
                </div><!-- .img-block -->
            </div><!-- .col -->
            <div class="col-lg-6">
                <div class="text-block">
                    <h2 class="title">Some unique features and awesome experience</h2>
                    <div class="g-gs">
                        <div class="service service-s3">
                            <div class="service-icon styled-icon styled-icon-s3 text-primary">
                                <img src="{{ asset('images/easy.png') }}" alt="">
                            </div>
                            <div class="service-text">
                                <h4 class="title">Easy to manage</h4>
                                <p>Our crypto dashboard is very easy to manage.</p>
                            </div>
                        </div><!-- .service -->
                        <div class="service service-s3">
                            <div class="service-icon styled-icon styled-icon-s3 text-success">
                                <img src="{{ asset('images/sell.png') }}" alt="">
                            </div>
                            <div class="service-text">
                                <h4 class="title">Instant Sale</h4>
                                <p>Place your cryptocurrency for sale, and have us sell it for you within
                                    few hours.</p>
                            </div>
                        </div><!-- .service -->
                        <div class="service service-s3">
                            <div class="service-icon styled-icon styled-icon-s3 text-success">
                                <img src="{{ asset('images/gift.png') }}" alt="">
                            </div>
                            <div class="service-text">
                                <h4 class="title">Monthly Bonus</h4>
                                <p>Our most active users get an amazing monthly reward of up to <span
                                        class="text-warning">1,000 USD</span>.</p>
                            </div>
                        </div><!-- .service -->
                    </div>
                </div><!-- .text-block -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- .section -->
<section class="section section-cta">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="text-block is-compact">
                    <h2 class="title">Get Started with <span class="text-muted">Coinblare</span></h2>
                    <p class="lead">Over 10 million people have chosen Coinblare to power their crypto
                        dream. Join today and feel the power of cryptocurrency.</p>
                    <ul class="btns-inline justify-center">
                        <li>
                            <a href="{{ route('register') }}" target="_blank"
                                class="btn btn-xl btn-warning">Get
                                Started</a>
                        </li>
                    </ul>
                </div>
            </div><!-- ,col -->
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- .section -->
@endsection