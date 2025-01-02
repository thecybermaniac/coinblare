<div class="nk-header nk-header-fluid nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/crypto/index.html">
                    <img src="{{ asset('images/coinblare-logo.png') }}" alt="logo" width="110">
                </a>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown notification-dropdown me-n1">
                        <a href="#" onclick="{{ markAsRead() }}" class="dropdown-toggle nk-quick-nav-icon"
                            data-bs-toggle="dropdown">
                            <div class="@if ($unread == true) icon-status icon-status-info @endif"><em
                                    class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="#">Mark All as Read</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    @foreach ($notification as $n)
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em
                                                    class="icon icon-circle bg-{{ $n->data['color'] }}-dim {!! $n->data['icon'] !!}"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">{{ $n->data['subject'] }}</div>
                                                <div class="nk-notification-time">{{ $n->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div><!-- .dropdown-inner -->
                                    @endforeach
                                </div>
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="#">{{ __('View All') }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown user-dropdown">
                        <div class="user-toggle">
                            <div class="user-avatar sm">
                                <em class="icon ni ni-user-alt"></em>
                            </div>
                            <div class="user-info d-none d-md-block">
                                <div class="user-status text-success">User</div>
                                <div class="user-name text-capitalize">{{ Auth::user()->name }}</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
