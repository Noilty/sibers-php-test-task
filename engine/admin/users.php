<?php
/**
 * File with functions for working with users
 */

/**
 * Get list users for page admin/list
 *
 * @param $pageId
 * @return array
 */
function getListUsers($pageId)
{
    $pageId = !empty($pageId) ? $pageId : 1; // current page
    $pageId = preg_replace('/[^0-9]/', '', $pageId);

    $art = ($pageId * ELEM_COUNT) - ELEM_COUNT;

    return R::getAll('SELECT id, name, surname FROM users order by id desc LIMIT :art, :elemCount', array(
        'art' => (int)$art,
        'elemCount' => ELEM_COUNT
    ));
}

/**
 * Get user data for page admin/user/profile
 *
 * @param $id
 * @return array
 */
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

/**
 * Edit user profile for page admin/user/profile/edit
 * Data profile
 *
 * @param $id
 * @return array
 */
function editUserDataProfile($id)
{
    $id = empty($id) ? 1 : $id;
    $id = preg_replace('/[^0-9]/', '', $id);

    $arrAlerts = array();

    $arrPost = array(
        'login' => xss($_POST['userLogin']),
        'password' => xss($_POST['userPassword']),
        're_password' => xss($_POST['userRePassword']),
    );

    $bPasswd = $arrPost['password'] === $arrPost['re_password'];
    unset($arrPost['re_password']);

    if (isEmpty($arrPost)) {
        if ($bPasswd) {
            $arrPost['password'] = password_hash($arrPost['password'], PASSWORD_DEFAULT);

            $searchLogin = R::getRow(
                'select id, login from users where login=:login limit 1', array(
                    'login' => $arrPost['login']
                )
            );

            if (!$searchLogin) {
                $editUser = R::load('users', $id);

                $editUser->login = $arrPost['login'];
                $editUser->password = $arrPost['password'];

                if (R::store($editUser)) {
                    //loginUser($arrPost['login']);
                    //header("Location: /index.php");
                    array_push($arrAlerts, 'Success, data changed!');
                } else {
                    array_push($arrAlerts, 'Error, data not changed!');
                }
            } else {
                array_push($arrAlerts, 'Name user already used by.');
            }
        } else {
            array_push($arrAlerts, 'Different passwords.');
        }
    } else {
        array_push($arrAlerts, 'All fields must be filled.');
    }

    return $arrAlerts;
}

/**
 * Edit user profile for page admin/user/profile/edit
 * Personal data
 *
 * @param $id
 * @return array
 */
function editUserPersonalData($id)
{
    $id = empty($id) ? 1 : $id;
    $id = preg_replace('/[^0-9]/', '', $id);

    $arrAlerts = array();

    $arrPost = array(
        'name' => xss($_POST['userName']),
        'surname' => xss($_POST['userSurname']),
        'gender' => xss($_POST['userGender']),
        'birthday' => xss($_POST['userBirthday'])
    );

    if (isEmpty($arrPost)) {
        $editUser = R::load('users', $id);

        $editUser->name = $arrPost['name'];
        $editUser->surname = $arrPost['surname'];
        $editUser->gender = $arrPost['gender'];
        $editUser->birthday = $arrPost['birthday'];

        if (R::store($editUser)) {
            //loginUser($arrPost['login']);
            //header("Location: /index.php");
            array_push($arrAlerts, 'Success, data changed!');
        } else {
            array_push($arrAlerts, 'Error, data not changed!');
        }
    } else {
        array_push($arrAlerts, 'All fields must be filed.');
    }

    return $arrAlerts;
}

/**
 * Delete user profile for page admin/user/profile/delete
 *
 * @param $id
 * @return array
 */
function deleteUser($id)
{
    $id = empty($id) ? 1 : $id;
    $id = preg_replace('/[^0-9]/', '', $id);

    $arrAlerts = array();

    $deleteUser = R::load('users', $id);

    if (R::trash($deleteUser)) {
        array_push($arrAlerts, 'Success, user  deleted.');
    } else {
        array_push($arrAlerts, 'Error, user not deleted.');
    }

    return $arrAlerts;
}