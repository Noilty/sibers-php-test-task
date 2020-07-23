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
 * @param array $dataUser return functions auth() in file engine/login.php
 */
function loginUser($dataUser = array())
{
    $_SESSION['auth'] = [
        'id' => (int)$dataUser['id'],
        'login' => $dataUser['login'],
    ];

    $userRole = R::getAll('select role_id from user__role where user_id=:user_id' , array(
        'user_id' => $dataUser['id']
    ));

    foreach ($userRole as $key => $roles) {
        foreach ($roles as $role) {
            ((int)$role === 1) ? $_SESSION['auth']['admin'] = true : $_SESSION['auth']['admin'] = false;
        }
    }
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