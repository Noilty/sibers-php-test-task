<?php
/**
 * File with database settings
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'sibers');
define('DB_CHARSET', 'utf8');

define('DB_USER_NAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_FROZEN', true);

return array(
    'db_rb' => array(
        'dsn' => 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,
        'user_name' => DB_USER_NAME,
        'password' => DB_PASSWORD,
        'frozen' => DB_FROZEN
    )
);