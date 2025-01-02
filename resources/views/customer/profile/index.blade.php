@extends('customer.layout.master')

@section('content')
    @include('customer.layout.preloader')
    <div class="nk-content nk-content-fluid mt-5 d-none mb-5" id="market">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <span>Account Setting</span>
                        </div>
                        <h2 class="nk-block-title fw-normal">My Profile</h2>
                        <div class="nk-block-des">
                            <p>You have full control to manage your own account setting.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#persona">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#security">Security</a>
                    </li>
                </ul><!-- .nk-menu -->
                <!-- NK-Block -->
                <div class="tab-content">
                    <div class="tab-pane active" id="persona">
                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Personal Information</h5>
                                    <div class="nk-block-des">
                                        <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Basics</h6>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Full Name</span>
                                        <span class="data-value text-capitalize">{{ $user->name }}</span>
                                    </div>
                                    <div class="data-col data-col-end">
                                        <span class="data-more">
                                            <em class="icon ni ni-forward-ios"></em>
                                        </span>
                                    </div>
                                </div><!-- .data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value">{{ $user->email }}</span>
                                    </div>
                                    <div class="data-col data-col-end">
                                        <span class="data-more">
                                            <em class="icon ni ni-forward-ios"></em>
                                        </span>
                                    </div>
                                </div><!-- .data-item -->
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Phone Number</span>
                                        @if (is_null($user->phone))
                                            <span class="data-value text-soft">Not add yet</span>
                                        @else
                                            <span class="data-value">{{ $user->phone }}</span>
                                        @endif
                                    </div>
                                    <div class="data-col data-col-end">
                                        <span class="data-more">
                                            <em class="icon ni ni-forward-ios"></em>
                                        </span>
                                    </div>
                                </div><!-- .data-item -->
                            </div><!-- .nk-data -->
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Preferences & Others</h6>
                                </div>
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Language</span>
                                        <span class="data-value">{{ lang(app()->getLocale()) }}</span>
                                    </div>
                                    <div class="data-col data-col-end">
                                        <a data-bs-toggle="modal" href="#lang" class="link link-primary">Change
                                            Language</a>
                                    </div>
                                </div><!-- .data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Your Promo Code</span>
                                        <span class="data-value" id="refUrl">{{ $user->promo_code}}</span>
                                    </div>
                                    <div class="data-col data-col-end">
                                        <div class="form-clip clipboard-init mt-2" data-clipboard-target="#refUrl"
                                            data-success="Copied" data-text="Copy Address">
                                            <em class="clipboard-icon icon ni ni-copy"></em>
                                            <span class="clipboard-text">Copy Code</span>
                                        </div>
                                    </div>
                                </div><!-- .data-item -->
                            </div><!-- .nk-data -->
                        </div>
                    </div>
                    <div class="tab-pane" id="security">
                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Security Settings</h5>
                                    <div class="nk-block-des">
                                        <p>These settings are helps you keep your account secure.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="card card-bordered">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                                            <div class="nk-block-text">
                                                <h6>Change Password</h6>
                                                <p>Set a unique password to protect your account.</p>
                                            </div>
                                            <div class="nk-block-actions flex-shrink-sm-0">
                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                    <li class="order-md-last">
                                                        <a href="#change-password" data-bs-toggle="modal"
                                                            class="btn btn-primary">Change Password</a>
                                                    </li>
                                                    <li>
                                                        <em class="text-soft text-date fs-12px">Last changed: <span>Oct 2,
                                                                2019</span></em>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                                            <div class="nk-block-text">
                                                <h6>2FA Authentication <span class="badge bg-success">Enabled</span></h6>
                                                <p>Secure your account with 2FA security. When it is activated you will need
                                                    to enter not only your password, but also a special code using app. You
                                                    can receive this code by in mobile app. </p>
                                            </div>
                                            <div class="nk-block-actions">
                                                <a href="#" class="btn btn-primary">Disable</a>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
                <!-- NK-Block @e -->
                <!-- //  Content End -->
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form action="{{ route('customer.update') }}" method="POST" id="update-profile">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Full Name</label>
                                            <input type="text" name="name" class="form-control form-control-lg"
                                                id="full-name" value="{{ $user->name }}"
                                                placeholder="Update Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Email Address</label>
                                            <input type="text" name="email" class="form-control form-control-lg"
                                                id="display-name" value="{{ $user->email }}"
                                                placeholder="Update Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Phone Number</label>
                                            <input type="text" name="phone" class="form-control form-control-lg"
                                                id="phone-no" value="{{ $user->phone }}" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-lg btn-primary">Update
                                                    Profile</button>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-dismiss="modal"
                                                    class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    <div class="modal fade" role="dialog" id="change-password">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Change Password</h5>
                    <form action="{{ route('customer.change-password') }}" method="POST" id="change-password7">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Current Password</label>
                                    <input type="password" name="current_password" class="form-control form-control-lg"
                                        id="full-name" placeholder="Enter Current Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">New Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="display-name" placeholder="Enter New Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Confirm New Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-lg" id="display-name"
                                        placeholder="Re-Enter New Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-lg btn-primary">Change
                                            Password</button>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
@endsection
@push('script')
    {!! $validator->selector('#update-profile') !!}

    <script>
        $(document).ready(function() {

            $('#update-profile').on('submit', function(e) {

                e.preventDefault();

                form = $(this);

                if (form.valid()) {

                    var f = form.find(':submit');

                    var button = f.html();

                    f.attr("disabled", "disabled")
                        .html(
                            '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><span>Loading...</span>'
                        );

                    // $(form).ajaxSubmit();
                    $.ajax({
                        url: form.attr('action'),
                        type: "POST",
                        data: form.serialize(),
                        success: function(result) {

                            console.log(result);

                            f.removeAttr("disabled").html(button);

                            window.location.replace(result.redirect_url);

                        },
                        error: function(xhr, status, error) {

                            f.removeAttr("disabled").html(button);

                            $.each(xhr.responseJSON.errors, function(key, item) {
                                $('input[name = ' + key + ']')
                                    .removeClass('is-valid')
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback">' + item +
                                        '</div>');

                            });

                        }
                    });
                }
            });
        });
        $(document).ready(function() {

            $('#change-password7').on('submit', function(e) {

                e.preventDefault();

                form = $(this);

                if (form.valid()) {

                    var f = form.find(':submit');

                    var button = f.html();

                    f.attr("disabled", "disabled")
                        .html(
                            '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><span>Loading...</span>'
                        );

                    // $(form).ajaxSubmit();
                    $.ajax({
                        url: form.attr('action'),
                        type: "POST",
                        data: form.serialize(),
                        success: function(result) {

                            console.log(result);

                            f.removeAttr("disabled").html(button);

                            window.location.replace(result.redirect_url);

                        },
                        error: function(xhr, status, error) {

                            f.removeAttr("disabled").html(button);

                            $.each(xhr.responseJSON.errors, function(key, item) {
                                $('input[name = ' + key + ']')
                                    .removeClass('is-valid')
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback">' + item +
                                        '</div>');

                            });

                        }
                    });
                }
            });
        });
    </script>
@endpush
