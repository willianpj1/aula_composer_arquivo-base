<?php

use app\controller\Home;

$app->get('/', Home::class . ':home');

$app->get('/home', Home::class . ':home');
