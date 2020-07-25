<?php
/**
 * File with function register user
 */

/**
 * Register
 *
 * @return array
 */
function register()
{
    $arrAlerts = array();

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
        if (LENGTH['LOGIN'][0] > strlen($arrPost['login']) or
            LENGTH['LOGIN'][1] < strlen($arrPost['login'])) {
            $errLength[] = 'Lenght <b>Login</b> from '.LENGTH['LOGIN'][0].' before '.LENGTH['LOGIN'][1].' symbols!';
        }

        if (LENGTH['PASSWD'][0] > strlen($arrPost['password']) or
            LENGTH['PASSWD'][1] < strlen($arrPost['password'])) {
            $errLength[] = 'Lenght <b>Passwd</b> from '.LENGTH['PASSWD'][0].' before '.LENGTH['PASSWD'][1].' symbols!';
        }

        if (LENGTH['NAME'][0] > strlen($arrPost['name']) or
            LENGTH['NAME'][1] < strlen($arrPost['name'])) {
            $errLength[] = 'Lenght <b>Name</b> from '.LENGTH['NAME'][0].' before '.LENGTH['NAME'][1].' symbols!';
        }

        if (LENGTH['SURNAME'][0] > strlen($arrPost['surname']) or
            LENGTH['SURNAME'][1] < strlen($arrPost['surname'])) {
            $errLength[] = 'Lenght <b>Surname</b> from '.LENGTH['SURNAME'][0].' before '.LENGTH['SURNAME'][1].' symbols!';
        }

        $bPasswd = $arrPost['password'] === $arrPost['re_password'];
        unset($arrPost['re_password']);

        if ($bPasswd) {
            $arrPost['password'] = password_hash($arrPost['password'], PASSWORD_DEFAULT);

            $searchUser = R::getRow(
                'select login from users where login=:login', array(
                    'login' => $arrPost['login']
                )
            );

            if (!$searchUser) {
                $newUser = R::dispense('users');
                foreach ($arrPost as $key => $value) {
                    if ($key !== 're_password') {
                        $newUser->$key = $value;
                    }
                }

                $idUser = R::count('users');
                $roleUser = array(
                    'user_id' => ($idUser+1),
                    'role_id' => 2
                );

                $defaultRoleUser = R::xdispense('user__role');
                foreach ($roleUser as $key => $value) {
                    $defaultRoleUser->$key = $value;
                }

                if (empty($errLength)) {
                    R::store($newUser);
                    R::store($defaultRoleUser);
                    //loginUser($arrPost['login']);
                    //header("Location: /index.php");
                    array_push($arrAlerts, 'Registration success.');
                } else {
                    array_push($arrAlerts, 'Registration not success.');
                    $arrAlerts = array_merge($arrAlerts, $errLength);
                }
            } else {
                array_push($arrAlerts, 'Name user already used by.');
            }
        } else {
            array_push($arrAlerts, 'Different passwords.');
        }
    } else {
        array_push($arrAlerts, 'All field must be filed.');
    }

    return $arrAlerts;
}