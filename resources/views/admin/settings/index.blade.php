@extends('admin.layout.master')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <span>Admin Setting</span>
                        </div>
                        <h2 class="nk-block-title fw-normal">Admin Profile</h2>
                        <div class="nk-block-des">
                            <p>You have full control to manage your own account setting.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#website">Website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#security">Personal</a>
                    </li>
                </ul><!-- .nk-menu -->
                <!-- NK-Block -->
                <div class="tab-content">
                    <div class="tab-pane active" id="website">
                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Website Information</h5>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ route('admin.setting.web') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-gs">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Website Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="web_name"
                                                            class="form-control form-control-lg"
                                                            placeholder="Website's Name" value="{{ setting('web_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Website Email</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="email"
                                                            class="form-control form-control-lg"
                                                            placeholder="Website's Email" value="{{ setting('email') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Website Copyright</label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="copyright" class="form-control form-control-lg" cols="30" rows="10"
                                                            placeholder="Website's Copyright">{{ setting('copyright') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Restrict Withdrawal</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="restrict" class="form-control form-control-lg" placeholder="example@example.com" value="{{ old('restrict', setting('restrict')) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Website Logo</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="logo"
                                                            class="form-control form-control-file form-control-lg ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Website Favicon</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="favicon"
                                                            class="form-control form-control-file form-control-lg ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="security">
                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Personal Settings</h5>
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
                                                <h6>Update Info</h6>
                                                <p>Update admin information.</p>
                                            </div>
                                            <div class="nk-block-actions flex-shrink-sm-0">
                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                    <li class="order-md-last">
                                                        <a href="#profile-update" data-bs-toggle="modal"
                                                            class="btn btn-primary">Update Info</a>
                                                    </li>
                                                    <li>
                                                        <em class="text-soft text-date fs-12px">Last updated: <span>Oct 2,
                                                                2019</span></em>
                                                    </li>
                                                </ul>
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
    <!-- Update Info Modal -->
    <div class="modal fade" role="dialog" id="profile-update">
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
                            <form action="{{ route('admin.settings.update-info') }}" method="POST" id="update-profile">
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

    <!-- Change Password Modal -->
    <div class="modal fade" role="dialog" id="change-password">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Change Password</h5>
                    <form action="{{ route('admin.settings.change-password') }}" method="POST" id="change-password7">
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
@push('settings')
    <script>
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
    </script>
@endpush
