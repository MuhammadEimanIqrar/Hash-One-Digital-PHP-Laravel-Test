<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Login | {{ config('app.name') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/Toastr/css/Toastr@2.1.3.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        {{-- <div class="app-logo-inverse mx-auto mb-3"></div> --}}
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <form action="{{ route('portal.auth.login') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <div>Welcome back,</div>
                                                <span>Please sign in to your account below.</span>
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" id="exampleEmail" placeholder="Email here..."
                                                        type="email" class="form-control" required
                                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword"
                                                        placeholder="Password here..." type="password"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="position-relative form-check">
                                                <input name="check" id="exampleCheck" type="checkbox"
                                                    class="form-check-input">
                                                <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                            </div> --}}
                                        {{-- <div class="divider"></div>
                                        <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6> --}}
                                    </div>
                                    <div class="modal-footer clearfix">
                                        {{-- <div class="float-left">
                                            <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                        </div> --}}
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary btn-lg">Login to
                                                Dashboard</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © {{ config('app.name') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('assets/libs/Toastr/js/Toastr@2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom/notify.js') }}"></script>
    <x-notify />

</body>

</html>
