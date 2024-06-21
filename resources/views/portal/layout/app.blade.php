<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> @yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/Toastr/css/Toastr@2.1.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/Select2/css/select2@4.1.0-rc.0.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/Select2/css/select2@4.1.0-rc.0.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom/portal/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/daterangePicker/css/daterangepicker.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('portal.layout.topbar')
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                @include('portal.layout.sidebar')
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner mb-5">
                    @yield('content')
                </div>
                @include('portal.layout.footer')
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetAlert2/sweetalert2@11.min.js') }}"></script>
    <script src="{{ asset('assets/libs/Toastr/js/Toastr@2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom/notify.js') }}"></script>
    <script src="{{ asset('assets/libs/Select2/js/select2@4.1.0-rc.0.min.js') }}"></script>
    {{-- Date Range Picker Links Start --}}
    <script type="text/javascript" src="{{ asset('assets/libs/daterangePicker/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/libs/daterangePicker/js/daterangepicker.js') }}"></script>
    {{-- Date Range Picker Links End --}}

    <x-notify />

    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>

    @yield('script')

</body>

</html>
