<div class="nk-footer nk-auth-footer-full fixed-bottom">
    <div class="container wide-lg">
        <div class="row g-3">
            <div class="col-lg-6 order-lg-last">
                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                    <li class="nav-item dropup">
                        <a class="dropdown-toggle dropdown-indicator has-indicator nav-link"
                            data-bs-toggle="dropdown" data-offset="0,10"><span>{{ $auth?->language_name }}</span></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                            <ul class="language-list">
                                <li>
                                    <a href="{{ route('website.change-lang', app()->getLocale()) }}" class="language-item">
                                        <span class="language-name">{{ $auth?->language_name }}</span>
                                    </a>
                                </li>
                                @foreach ($website as $w)
                                <li>
                                    <a href="{{ route('website.change-lang', $w?->language_code) }}" class="language-item">
                                        <span class="language-name">{{ $w?->language_name }}</span>
                                    </a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="#lang" data-bs-toggle="modal" class="language-item">
                                        <span class="language-name text-capitalize text-primary">see
                                            all</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="nk-block-content text-center text-lg-left">
                    <p class="text-soft">&copy; {{ date('Y') }} {{ setting('copyright') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade zoom" tabindex="-1" id="lang">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Languages</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    @foreach ($w_lang as $fl)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <a href="{{ route('website.change-lang', $fl?->language_code) }}">
                                <div class="card card-bordered" onmouseover="$(this).addClass('bg-primary')"
                                    onmouseout="$(this).removeClass('bg-primary')">
                                    <div class="card-body">
                                        <h5 class="card-text" style="font-size: 13px;">{{ $fl?->language_name }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>