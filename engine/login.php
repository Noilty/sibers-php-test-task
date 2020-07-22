<?php
/**
 * File with function auth user
 */

/**
 * Auth
 *
 * @return array
 */
function auth()
{
    $arrAlerts = array();

    $arrPost = array(
        'login' => xss($_POST['userLogin']),
        'password' => xss($_POST['userPassword'])
    );

    if (isEmpty($arrPost)) {
        $searchUser = R::getRow(
            'select * from users where login=:login limit 1',
            [
                'login' => $arrPost['login']
            ]
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

    return $arrAlerts;
}
