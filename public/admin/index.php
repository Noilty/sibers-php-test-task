<?php
/**
 * File with route page Admin
 */
require_once '../../engine/core.php';

function routeIndex()
{
    routeList();
}

function routeList()
{
    onlyAdmin();

    echo view('pages/admin/users/list', [
        'title' => 'Page/Admin/Users/List'
    ]);
}

function routeAdd()
{
    onlyAdmin();

    echo view('pages/admin/users/add', [
        'title' => 'Page/Admin/Users/Add'
    ]);
}

function routeEdit()
{
    onlyAdmin();

    echo view('pages/admin/users/edit', [
        'title' => 'Page/Admin/Users/Edit'
    ]);
}

function routeDeleted()
{
    onlyAdmin();

    echo view('pages/admin/users/deleted', [
        'title' => 'Page/Admin/Users/Deleted'
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