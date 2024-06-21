<?php

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return user()->hasRole('Super Admin');
    }
}
