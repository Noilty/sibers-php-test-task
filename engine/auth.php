<?php
/**
 * File for working with auth
 */

/**
 * Проверка авторизован ли пользователь
 */
function isLoggedUser()
{
    return isset($_SESSION['auth']['login']);
}

/**
 * Авторизация пользователя
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
 * Выход из системы
 */
function logoutUser()
{
    unset($_SESSION['auth']);
    session_destroy();
    header("Location: /");
}

/**
 * Проверка на администратора (смотреть в функции логина)
 */
function isAdmin()
{
    return (isset($_SESSION['auth']['login']) && $_SESSION['auth']['admin'] === true);
}

/**
 * Функция для открытия доступа только авторизованным пользователям
 */
function onlyAuth()
{
    if (!isLoggedUser()) {
        header("Location: /index.php?op=error");
        die();
    }
}

/**
 * Функция для открытия доступа только администраторам
 */
function onlyAdmin()
{
    if (!isAdmin()) {
        header("Location: /index.php?op=error");
    }
}