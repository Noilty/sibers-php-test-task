<?php
/**
 * File core systems
 */

define('ROOT', dirname(__DIR__));
define('DEFAULT_TEMPLATE', 'default');

define('ELEM_COUNT', 5); // elem count on the page user list

session_start();

require ROOT . '/config/main.php';
require ROOT . '/engine/rb-mysql.php';
require ROOT . '/engine/database.php';
require ROOT . '/engine/render.php';
require ROOT . '/engine/router.php';
require ROOT . '/engine/auth.php';
require ROOT . '/engine/login.php';
require ROOT . '/engine/register.php';

require ROOT . '/engine/admin/users.php';

/**
 * Date format
 *
 * @param $date
 * @param string $format
 * @return false|string
 */
function dateFormat($date, $format = 'Y-m-d')
{
    return date_format(date_create($date), $format);
}

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