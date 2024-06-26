@php
    $name = Auth::user()->name;
    $role = ucfirst(Auth::user()->role);
@endphp

<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src">
            <a href="#" class="text-dark text-decoration-none lead">
                <h4>{{ config('app.name') }}</h4>
                {{-- <img src="{{ asset(config('logo')) }}" alt="" class="img-fluid"> --}}
            </a>
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
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
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">

            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    {{-- <img width="42" class="rounded-circle" src="{{asset('assets/images/avatars/Muhammad Eiman Iqrar.jpg')}}"
                                        alt=""> --}}
                                    <span>{{ $name }}</span>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                style="background-image: url({{ asset('assets/images/dropdown-header/city3.jpg') }});">
                                            </div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            {{-- <img width="42" class="rounded-circle" src="{{asset('assets/images/avatars/Muhammad Eiman Iqrar.jpg')}}" alt=""> --}}
                                                            <span>{{ $name }}</span>
                                                        </div>
                                                        <div class="widget-content-left">
                                                            {{-- <div class="widget-heading"> {{ Auth::user()->name }} </div> --}}
                                                            <div class="widget-subheading opacity-8">A short
                                                                profile description</div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <form action="{{ route('portal.logout') }}" method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            {{-- <div class="widget-heading"> {{ $name }} </div> --}}
                            <div class="widget-subheading"> {{ $role }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
