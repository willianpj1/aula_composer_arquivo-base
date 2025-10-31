<?php

use app\controller\Home;

$app->get('/', Home::class . ':home');

$app->get('/home', Home::class . ':home');

use Slim\Routing\RouteCollectorProxy;

$app->group('/usuario', function (RouteCollectorProxy $group) {

    $group->get('/lista', User::class . ':lista');
    $group->get('/cadastro', User::class . ':cadastro');
});
