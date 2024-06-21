<?php

if (!function_exists('timeFormat')) {
    function timeFormat()
    {
        return 'H:i:s A';
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat()
    {
        return 'd-m-Y';
    }
}

if (!function_exists('timestampFormat')) {
    function timestampFormat()
    {
        return dateFormat() . ' ' . timeFormat();
    }
}
