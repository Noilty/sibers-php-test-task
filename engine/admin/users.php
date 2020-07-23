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