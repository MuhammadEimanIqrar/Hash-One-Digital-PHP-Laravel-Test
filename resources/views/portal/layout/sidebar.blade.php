@php
    $user = Auth::user();
    $user_role = $user->role;
@endphp
<div class="scrollbar-sidebar" style="overflow-y: auto;">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Menu</li>
            <li>
                <a href="{{ route('portal.index') }}">
                    <i class="metismenu-icon lnr-diamond prominent"></i> Portal
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon lnr-pushpin prominent"></i> Jobs
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon"></i>Create
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon"></i>Listing
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('portal.index') }}">
                    <i class="metismenu-icon lnr-envelope prominent"></i> Applications
                </a>
            </li>
        </ul>
    </div>
</div>
