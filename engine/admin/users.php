<?php
/**
 * File with functions for working with users
 */

function getListUsers()
{
    return R::getAll('select id, name, surname from users order by id desc');
}

function getUserData($id)
{
    $id = empty($id) ? 1 : $id;
    $id = preg_replace('/[^0-9]/', '', $id);

    return R::getAll(
        'select * from users where id=:id limit 1', array(
            'id' => (int)$id
        )
    );
}

function editUser($id)
{
    $id = empty($id) ? 1 : $id;
    $id = preg_replace('/[^0-9]/', '', $id);

    $arrAlerts = array();

    $arrPost = array(
        'login' => xss($_POST['userLogin']),
        'password' => xss($_POST['userPassword']),
        're_password' => xss($_POST['userRePassword']),
        'name' => xss($_POST['userName']),
        'surname' => xss($_POST['userSurname']),
        'gender' => xss($_POST['userGender']),
        'birthday' => xss($_POST['userBirthday'])
    );

    if (isEmpty($arrPost)) {
        $bPasswd = $arrPost['password'] === $arrPost['re_password'];
        unset($arrPost['re_password']);

        if ($bPasswd) {
            $arrPost['password'] = password_hash($arrPost['password'], PASSWORD_DEFAULT);

            $searchLogin = R::getRow(
                'select login from users where login=:login limit 1', array(
                    'login' => $arrPost['login']
                )
            );

            if (!$searchLogin) {
                $editUser = R::load('users', $id);

                $editUser->login = $arrPost['login'];
                $editUser->password = $arrPost['password'];
                $editUser->name = $arrPost['name'];
                $editUser->surname = $arrPost['surname'];
                $editUser->gender = $arrPost['gender'];
                $editUser->birthday = $arrPost['birthday'];

                if (R::store($editUser)) {
                    //loginUser($arrPost['login']);
                    //header("Location: /index.php");
                    array_push($arrAlerts, 'Данные изменены успешно');
                } else {
                    array_push($arrAlerts, 'Что то пошло не так, не удалась изменить данные');
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

    return $arrAlerts;
}