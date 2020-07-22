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

    echo view('pages/admin/users/list');
}

function routeAdd()
{
    onlyAdmin();

    echo view('pages/admin/users/add');
}

function routeEdit()
{
    onlyAdmin();

    echo view('pages/admin/users/edit');
}

function routeDeleted()
{
    onlyAdmin();

    echo view('pages/admin/users/deleted');
}

/**
 * Page Error
 */
function routeError()
{
    echo '404';
}

route();