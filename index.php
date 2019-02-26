<?php

require_once __DIR__ . '/vendor/autoload.php';

use Spectos\Requests\JSONRequest;

$container = new DI\Container();

$container->set('Spectos\Infrastructure\Database\Database', new Spectos\Infrastructure\Database\FileDatabase(__DIR__ . '/database.json'));


if($_GET['action'] === 'saveFeedback'){
    $controller = $container->get('Spectos\Feedbacks\Controllers\SaveFeedbackController');
    $request = new JSONRequest($_GET, file_get_contents('php://input'));
    $response = $controller->post($request);

    header('Content-Type: application/json');
    echo $response->getResponseJSON();
}

if($_GET['action'] === 'getFeedback'){
    $controller = $container->get('Spectos\Feedbacks\Controllers\GetFeedbackController');
    $request = new JSONRequest($_GET);
    $response = $controller->get($request);

    header('Content-Type: application/json');
    echo $response->getResponseJSON();
}