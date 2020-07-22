<?php
/**
 * File core systems
 */

define('ROOT', dirname(__DIR__));
define('DEFAULT_TEMPLATE', 'default');

require ROOT . '/config/main.php';
require ROOT . '/engine/render.php';
require ROOT . '/engine/router.php';
require ROOT . '/engine/auth.php';

/**
 * Check for empty
 * 
 * @param $array
 * @return array
 */
function isEmpty($array)
{
    $itemEmpty = array();

    foreach ($array as $key => $item) {
        if (empty($item)) {
            array_push($itemEmpty, $key);
        }
    }

    return $itemEmpty;
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
    echo '<pre>' . print_r($data) . '</pre>';
    die();
}