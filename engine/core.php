<?php
/**
 * File core systems
 */

define('ROOT', dirname(__DIR__));
define('DEFAULT_TEMPLATE', 'default');

session_start();

require ROOT . '/config/main.php';
require ROOT . '/engine/render.php';
require ROOT . '/engine/router.php';
require ROOT . '/engine/rb-mysql.php';
require ROOT . '/engine/auth.php';

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

/**
 * Check for empty
 *
 * @param $array
 * @return bool
 */
function isEmpty($array)
{
    $itemEmpty = array();

    foreach ($array as $key => $item) {
        if (empty($item)) {
            array_push($itemEmpty, $key);
        }
    }

    return empty($itemEmpty);
}

/**
 * XSS
 *
 * @param $value
 * @return string
 */
function xss($value)
{
    $value = trim($value);

    return htmlentities($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Debug
 *
 * @param $data
 */
function dd($data)
{
    echo '<pre>' . var_dump($data) . '</pre>';
    die();
}