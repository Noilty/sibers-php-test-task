<?php
/**
 * File with system configuration
 */

define('LENGTH', array(
    'LOGIN' => array(3, 16),
    'PASSWD' => array(3, 16),
    'NAME' => array(3, 32),
    'SURNAME' => array(3, 32),
));

$app = array(
    'app' => array(
        'name' => 'Sibers',
        'templatesPath' => ROOT . '/templates'
    )
);

return $app;