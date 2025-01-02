<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; {{ date('Y') }} {{ setting('copyright') }}</div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item dropup">
                        <a href="" class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base"
                            data-bs-toggle="dropdown"
                            data-offset="0,10"><span>{{ lang(Auth::user()->language) }}</span></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                            <ul class="language-list">
                                <li>
                                    <a href="{{ route('customer.changeLang', Auth::user()->language) }}" class="language-item">
                                        <span
                                            class="language-name text-capitalize">{{ lang(Auth::user()->language) }}</span>
                                    </a>
                                </li>
                                @foreach ($lang as $l)
                                    <li>
                                        <a href="{{ route('customer.changeLang', $l->language_code) }}" class="language-item">
                                            <span class="language-name text-capitalize"></span>
                                        </a>
                                    </li>
                                @endforeach
                                @if ($lang->count() == 2)
                                    <li>
                                        <a href="#lang" data-bs-toggle="modal" class="language-item">
                                            <span class="language-name text-capitalize text-primary"></span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Language Modal -->
<!-- Modal Content Code -->
<div class="modal fade zoom" tabindex="-1" id="lang">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-body">
                <div class="row g-3">
                    @foreach ($f_lang as $fl)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <a href="{{ route('customer.changeLang', $fl->language_code) }}">
                                <div class="card card-bordered" onmouseover="$(this).addClass('bg-primary')"
                                    onmouseout="$(this).removeClass('bg-primary')">
                                    <div class="card-body">
                                        <h5 class="card-text" style="font-size: 13px;">{{ $fl->language_name }}</h5>
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
