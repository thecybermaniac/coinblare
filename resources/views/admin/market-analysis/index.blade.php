@extends('admin.layout.master')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Market Analysis</h3>
                            <div class="nk-block-des text-soft">
                                <p>Crypto Market Overview</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js"
                            async>
                            {
                                "symbols": [
                                    [
                                        "BITSTAMP:BTCUSD|1D"
                                    ],
                                    [
                                        "BITSTAMP:ETHUSD|1D"
                                    ],
                                    [
                                        "BITSTAMP:USDTUSD|1D"
                                    ],
                                    [
                                        "BINANCE:BNBUSD|1D"
                                    ],
                                    [
                                        "BITSTAMP:XRPUSD|1D"
                                    ],
                                    [
                                        "GEMINI:USDCUSD|1D"
                                    ],
                                    [
                                        "BTSE:DOGUSD|1D"
                                    ],
                                    [
                                        "KRAKEN:ADAUSD|1D"
                                    ],
                                    [
                                        "COINBASE:SOLUSD|1D"
                                    ],
                                    [
                                        "BINANCE:TRXUSD|1D"
                                    ],
                                    [
                                        "COINBASE:LTCUSD|1D"
                                    ]
                                ],
                                "chartOnly": false,
                                "width": 1100,
                                "height": 500,
                                "locale": "en",
                                "colorTheme": "dark",
                                "autosize": false,
                                "showVolume": false,
                                "showMA": false,
                                "hideDateRanges": false,
                                "hideMarketStatus": false,
                                "hideSymbolLogo": false,
                                "scalePosition": "right",
                                "scaleMode": "Normal",
                                "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                                "fontSize": "10",
                                "noTimeScale": false,
                                "valuesTracking": "1",
                                "changeMode": "price-and-percent",
                                "chartType": "area",
                                "maLineColor": "#2962FF",
                                "maLineWidth": 1,
                                "maLength": 9,
                                "lineWidth": 2,
                                "lineType": 0,
                                "dateRanges": [
                                    "1d|1",
                                    "1m|30",
                                    "3m|60",
                                    "12m|1D",
                                    "60m|1W",
                                    "all|1M"
                                ]
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection