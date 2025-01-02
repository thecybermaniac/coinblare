<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Email Templates | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-email.css') }}">
</head>

<body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="content-page wide-md m-auto">
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <table class="email-wraper">
                                                <tbody><tr>
                                                    <td class="py-5">
                                                        <table class="email-header">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center pb-4">
                                                                        <a href="#"><img class="email-logo" src="{{ asset('images/logo-dark2x.png') }}" alt="logo"></a>
                                                                        <p class="email-title">Most Effectient Way To Cryptocurrency</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="email-body text-center">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-4">
                                                                        <img src="{{ asset('images/email/kyc-success.png') }}" alt="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="px-3 px-sm-5 pb-3 pb-sm-5">
                                                                        <h5 class="text-success mb-3">Account Reactivated.</h5>
                                                                        <p>Dear {{ $name }}, your account has been reactivated successfully and you can continue your
                                                                        trading journey. We are sorry for any incovience. Thanks!</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="px-3 px-sm-5 pb-4">
                                                                        <a href="{{ route('customer.home') }}" target="_blank" class="btn btn-primary text-white">Go to Site</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="email-footer">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center pt-4">
                                                                        <p class="email-copyright-text">Copyright © {{ date('Y') }} Cryptobot, Inc. All rights reserved.</p>
                                                                        <ul class="email-social">
                                                                            <li><a href="#"><img src="{{ asset('images/socials/facebook.png') }}" alt=""></a></li>
                                                                            <li><a href="#"><img src="{{ asset('images/socials/twitter.png') }}" alt=""></a></li>
                                                                            <li><a href="#"><img src="{{ asset('images/socials/youtube.png') }}" alt=""></a></li>
                                                                        </ul>
                                                                        <p class="fs-12px pt-4">This email was sent to you as a registered member of <a href="https://softnio.com">cryptobot.com</a>. To update your emails preferences <a href="{{ route('customer.profile') }}" target="_blank">click here</a>.</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .content-page -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.2') }}"></script>
</body>

</html>