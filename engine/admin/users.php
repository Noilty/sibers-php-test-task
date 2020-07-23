<?php
/**
 * File with functions for working with users
 */

function getListUsers()
{
    return R::getAll('select id, name, surname from users');
}

function getUserData($id)
{
    return R::getAll('select * from users where id=:id limit 1' , array(
        'id' => $id
    ));;
}