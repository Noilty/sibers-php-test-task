<?php
/**
 * File for working with auth
 */

/**
 * Checking, if user is auth
 */
function isLoggedUser()
{
    return isset($_SESSION['auth']['login']);
}

/**
 * Auth users
 *
 * @param $login
 */
function loginUser($login)
{
    $searchUser = R::getRow(
        'select * from users where login=:login',
        [
            'login' => $login
        ]
    );

    $_SESSION['auth'] = [
        'id' => $searchUser['id'],
        'login' => $searchUser['login'],
    ];
}

/**
 * Logout
 */
function logoutUser()
{
    unset($_SESSION['auth']);
    session_destroy();
    header("Location: /");
}

/**
 * Checking for admin role (view in function login)
 *
 * @return bool
 */
function isAdmin()
{
    return (isset($_SESSION['auth']['login']) && $_SESSION['auth']['admin'] === true);
}

/**
 * Access for only auth users
 */
function onlyAuth()
{
    if (!isLoggedUser()) {
        header("Location: /index.php?op=error");
        die();
    }
}

/**
 * Access for only admin
 */
function onlyAdmin()
{
    if (!isAdmin()) {
        header("Location: /index.php?op=error");
    }
}