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
        $arrPost = array(
            'login' => xss($_POST['userLogin']),
            'password' => xss($_POST['userPassword'])
        );

        if (isEmpty($arrPost)) {
            $searchUser = R::getRow(
                'select * from users where login=:login limit 1',
                ['login' => $arrPost['login']]
            );

            if (!empty($searchUser)) {
                $bPasswd = password_verify($arrPost['password'], $searchUser['password']);

                if ($bPasswd) {
                    loginUser($arrPost['login']);
                    header("Location: /index.php");
                    die();
                }
            } else {
                array_push($arrAlerts, 'Пользователь не найден');
            }
        } else {
            array_push($arrAlerts, 'Все поля должны быть заполнены');
        }
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
        $arrPost = array(
            'login' => xss($_POST['userLogin']),
            'password' => xss($_POST['userPassword']),
            're_password' => xss($_POST['userRePassword']),
            'name' => xss($_POST['userName']),
            'surname' => xss($_POST['userSurname']),
            'gender' => xss($_POST['userGender']),
            'birthday' => xss($_POST['userBirthday']),
            'reg_date' => date('Y-m-d', time()),
        );

        if (isEmpty($arrPost)) {
            $bPasswd = $arrPost['password'] === $arrPost['re_password'];
            unset($arrPost['re_password']);

            if ($bPasswd) {
                $arrPost['password'] = password_hash($arrPost['password'], PASSWORD_DEFAULT);

                $searchUser = R::getRow(
                    'select login from users where login=:login',
                    [
                        'login' => $arrPost['login']
                    ]
                );;

                if (!$searchUser) {
                    $newUser = R::dispense('users');

                    foreach ($arrPost as $key => $value) {
                        if ($key !== 're_password') {
                            $newUser->$key = $value;
                        }
                    }

                    if (R::store($newUser)) {
                        //loginUser($arrPost['login']);
                        //header("Location: /index.php");
                        array_push($arrAlerts, 'Регистрация успешна');
                    } else {
                        array_push($arrAlerts, 'Регистрация не удалась');
                    }
                } else {
                    array_push($arrAlerts, 'Имя пользователя уже используется');
                }
            } else {
                array_push($arrAlerts, 'Пароли не совпадают');
            }
        } else {
            array_push($arrAlerts, 'Все поля должны быть заполнены');
        }
    }

    echo view('register', [
        'title' => 'Page/Register',
        'alerts' => $arrAlerts
    ]);
}

/**
 * Выход из системы
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