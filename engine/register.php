<?php
/**
 * File with function register user
 */

function register()
{
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