<?php
/**
 * Created by PhpStorm.
 * User: eu
 * Date: 06/10/2015
 * Time: 19:21
 */

return array(
    'doctrine' => array(
        'paths'     => array(__DIR__ . '/src'),
        'isDevMode' => false,
        'dbParams'  => array(
            'driver'   => 'pdo_mysql',
            'dbname'   => 'flow',
            'user'     => 'flow',
            'password' => 'flow',
        ),
    ),
);
