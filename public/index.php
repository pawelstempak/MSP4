<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;
use app\core\Router;
use app\core\Request;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');

$app->run();