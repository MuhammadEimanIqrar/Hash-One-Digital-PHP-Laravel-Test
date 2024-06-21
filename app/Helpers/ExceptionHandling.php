<?php

if (!function_exists('successType')) {
    function successType()
    {
        return 'success';
    }
}

if (!function_exists('errorType')) {
    function errorType()
    {
        return 'error';
    }
}

if (!function_exists('warningType')) {
    function warningType()
    {
        return 'warning';
    }
}

if (!function_exists('defaultErrorMessage')) {
    function defaultErrorMessage()
    {
        return 'Oops! Something went wrong, please contact system administrator.';
    }
}

if (!function_exists('errorMessage')) {
    function errorMessage($exception)
    {
        if (config('app.debug') && config('app.env') === 'local') {
            return $exception->getMessage() . ' ' . $exception->getLine();
        }
        return defaultErrorMessage();
    }
}
