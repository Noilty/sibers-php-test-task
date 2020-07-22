<?php
/**
 * File with route page Users
 */
require_once '../engine/core.php';

/**
 * Page Index
 */
function routeIndex()
{
    routeProfile();
}

/**
 * Page Profile
 */
function routeProfile()
{
    onlyAuth();

    echo view('pages/users/profile');
}

/**
 * Page Error
 */
function routeError()
{
    echo '404';
}

route();