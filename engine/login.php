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
            'select * from users where login=:login limit 1', array(
                'login' => $arrPost['login']
            )
        );

        if (!empty($searchUser)) {
            $bPasswd = password_verify($arrPost['password'], $searchUser['password']);

            if ($bPasswd) {
                loginUser($searchUser);
                header("Location: /index.php");
                die();
            }
        } else {
            array_push($arrAlerts, 'Error, user not found.');
        }
    } else {
        array_push($arrAlerts, 'All fields must be filed.');
    }

    return $arrAlerts;
}
