<?php
/**
 * File functions routes
 */

/**
 * Route
 */
function route()
{
    $action = (isset($_GET['op'])) ? $_GET['op'] : 'index';

    $action = str_replace('-', ' ', $action);
    $action = ucwords($action);
    $action = str_replace(' ', '', $action);

    $action = 'route' . ucfirst($action);

    if (function_exists($action)) {
        call_user_func($action);
    } else {
        call_user_func('routeError');
    }
}