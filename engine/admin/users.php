<?php
/**
 * File with functions for working with users
 */

function listUsers()
{
    return R::getAll('select id, name, surname from users');
}

function userData($id)
{
    return R::getAll('select * from users where id=:id limit 1' , array(
        'id' => $id
    ));;
}