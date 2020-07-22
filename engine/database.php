<?php
/**
 * File for working with database
 */

/**
 * Connection to Database
 */
R::setup(
    $config['db_rb']['dsn'],
    $config['db_rb']['user_name'],
    $config['db_rb']['password'],
    $config['db_rb']['frozen']
);

/**
 * Fix Prefixes table
 * https://redbeanphp.com/index.php?p=/prefixes
 */
R::ext('xdispense', function( $type ){
    return R::getRedBean()->dispense( $type );
});

if(!R::testConnection()) die('No connection for database!');