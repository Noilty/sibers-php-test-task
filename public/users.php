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
    echo view('users/list');
}

function routeProfile()
{
    echo view('users/profile');
}

function routeAdd()
{
    echo view('users/add');
}

function routeEdit()
{
    echo view('users/edit');
}

function routeDeleted()
{
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