<?php
/**
 * File with route page Admin
 */
require_once '../../engine/core.php';

/**
 * Page Admin/Index
 */
function routeIndex()
{
    routeList();
}

/**
 * Page Admin/List
 */
function routeList()
{
    onlyAdmin();

    $pageId = xss($_GET['page']);

    $usersCount = R::getAll('select count(*) from users');
    $total = (int)$usersCount[0]['count(*)'];
    $pagination = (int)ceil($total / ELEM_COUNT);

    echo view('pages/admin/users/list', [
        'title' => 'Page/Admin/Users/List',
        'arrListUsers' => getListUsers($pageId),
        'iPagination' => $pagination
    ]);
}

/**
 * Page Admin/Profile
 */
function routeProfile()
{
    onlyAdmin();

    $userId = xss($_GET['id']);

    echo view('pages/admin/users/profile', [
        'title' => 'Page/Admin/Users/profile',
        'userData' => getUserData($userId)
    ]);
}

/**
 * Page Admin/Add
 */
function routeAdd()
{
    onlyAdmin();

    $arrAlerts = array();

    if (isset($_POST['submitRegister'])) {
        $arrAlerts = register();
    }

    echo view('pages/admin/users/add', [
        'title' => 'Page/Admin/Users/Add',
        'alerts' => $arrAlerts
    ]);
}

/**
 * Page Admin/Edit
 */
function routeEdit()
{
    onlyAdmin();

    $userId = xss($_GET['id']);

    $arrAlerts = array();

    if (isset($_POST['submitEditUserDataProfile'])) {
        $arrAlerts = editUserDataProfile($userId);
    }

    if (isset($_POST['submitEditUserPersonalData'])) {
        $arrAlerts = editUserPersonalData($userId);
    }

    echo view('pages/admin/users/edit', [
        'title' => 'Page/Admin/Users/Edit',
        'userData' => getUserData($userId),
        'alerts' => $arrAlerts
    ]);
}

/**
 * Page Admin/Deleted
 */
function routeDeleted()
{
    onlyAdmin();

    $userId = xss($_GET['id']);

    $arrAlerts = array();

    if (isset($_POST['submitDeleted'])) {
        $arrAlerts = deleteUser($userId);
    }

    echo view('pages/admin/users/deleted', [
        'title' => 'Page/Admin/Users/Deleted',
        'userData' => getUserData($userId),
        'alerts' => $arrAlerts
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