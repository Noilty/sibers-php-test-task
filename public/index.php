<?php
/**
 * File with route page Index
 */
require_once '../engine/core.php';

function routeIndex()
{
    echo view('index', [
        'title' => 'Page/Index'
    ]);
}

/**
 * Page Login
 */
function routeLogin()
{
    if (isLoggedUser()) {
        header("Location: /index.php");
        die();
    }

    $arrAlerts = array();

    if (isset($_POST['submitAuth'])) {
        $arrAlerts = auth();
    }

    echo view('login', [
        'title' => 'Page/Login',
        'alerts' => $arrAlerts
    ]);
}

/**
 * Page Registration
 */
function routeRegister()
{
    if (isLoggedUser()) {
        header("Location: /index.php");
    }

    $arrAlerts = array();

    if (isset($_POST['submitRegister'])) {
        $arrAlerts = register();
    }

    echo view('register', [
        'title' => 'Page/Register',
        'alerts' => $arrAlerts
    ]);
}

/**
 * Page Logout
 */
function routeLogout()
{
    logoutUser();
}

/**
 * Page Error
 */
function routeError()
{
    echo '404';
}

route();