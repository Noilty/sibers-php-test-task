<?php
/**
 * File with route page Users
 */
require_once '../engine/core.php';

function routeIndex()
{
    routeList();
}

function routeList()
{
    onlyAuth();

    echo view('users/list');
}

function routeProfile()
{
    onlyAuth();

    echo view('users/profile');
}

function routeAdd()
{
    onlyAuth();

    echo view('users/add');
}

function routeEdit()
{
    onlyAuth();

    echo view('users/edit');
}

function routeDeleted()
{
    onlyAuth();

    echo view('users/deleted');
}

/**
 * Page Error
 */
function routeError()
{
    echo '404';
}

route();