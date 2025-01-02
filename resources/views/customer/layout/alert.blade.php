@if (session()->has('warning') || session()->has('danger'))
    <div class="nk-content">
        <div class="nk-block">
            <div class="container">
                <div class="row" id="alert-con">
                    @if (session()->has('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>{{ translate(session()->get('warning')) }}</strong>
                        </div>
                    @endif
                    @if (session()->has('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            <strong>{{ translate(session()->get('danger')) }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
