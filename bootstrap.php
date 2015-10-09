<?php
/**
 * Created by PhpStorm.
 * User: eu
 * Date: 09/10/2015
 * Time: 19:25
 */
require_once "vendor/autoload.php";

$config = require_once __DIR__."/config.php";
$config = array_replace_recursive($config, require_once __DIR__."/config.local.php");

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$entityManager = EntityManager::create(
    $config['doctrine']['dbParams'],
    Setup::createAnnotationMetadataConfiguration(
        $config['doctrine']['paths'],
        $config['doctrine']['isDevMode']
    )
);
