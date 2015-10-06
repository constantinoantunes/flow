<?php
/**
 * Created by PhpStorm.
 * User: eu
 * Date: 06/10/2015
 * Time: 19:20
 */

require_once __DIR__."/../../vendor/autoload.php";
$config = require_once __DIR__."/../../config.php";
$config = array_merge_recursive($config, require_once __DIR__."/../../config.local.php");
$app = new \Slim\Slim();
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());

$app->get('/task', function () use ($app) {
    // TODO fetch from database
    $output = array();
    $app->render(200, array(
        'return' => $output
    ));
});

$app->post('/task/add', function () use ($app) {
    $app->render(501, array());
});

$app->post('/task/done', function () use ($app) {
    $app->render(501, array());
});

$app->run();
