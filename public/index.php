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
    }

    $arrMessage = array();

    if (isset($_POST['submitAuth'])) {
        $arrPost = array(
            'login' => xss($_POST['userLogin']),
            'password' => xss($_POST['userPassword'])
        );

        if (isEmpty($arrPost)) {
            // Авторизация
        }
    }

    echo view('login', [
        'title' => 'Page/Login'
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

    $arrMessage = array();

    if (isset($_POST['submitRegister'])) {
        $arrPost = array(
            'login' => xss($_POST['userLogin']),
            'password' => xss($_POST['userPassword']),
            'rePassword' => xss($_POST['userRePassword']),
            'name' => xss($_POST['userName']),
            'lastName' => xss($_POST['userLastName']),
            'gender' => xss($_POST['userGender']),
            'dateBirth' => xss($_POST['userDateBirth'])
        );

        if (isEmpty($arrPost)) {
            // регистрация
        }
    }

    echo view('register', [
        'title' => 'Page/Register'
    ]);
}

/**
 * Page Error
 */
function routeError()
{
    echo '404';
}

route();