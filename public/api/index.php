<?php
/**
 * Created by PhpStorm.
 * User: eu
 * Date: 06/10/2015
 * Time: 19:20
 */

require_once __DIR__."/../../bootstrap.php";

/** @var \Doctrine\ORM\EntityManager $entityManager */

$app = new \Slim\Slim();
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());

$app->get('/task', function () use ($app, $entityManager) {
    $output = [];
    $taskRepo = $entityManager->getRepository('Flow\\Entity\\Task');

    /** @var \Flow\Entity\Task $task */
    foreach ($taskRepo->findAll() as $task) {
        $output[] = [
            'id' => $task->getId(),
            'title' => $task->getTitle(),
            'done' => $task->isDone(),
        ];
    }

    $app->render(200, array(
        'return' => $output
    ));
});

$app->post('/task', function () use ($app) {
    // TODO insert in database
    $app->render(200, array(
        'return' => ['id' => 3, 'title' => $_POST['title'], 'done' => false],
    ));
});

$app->post('/task/done', function () use ($app) {
    $app->render(501, array());
});

$app->run();
