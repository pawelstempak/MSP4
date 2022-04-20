<?php
/* public/index.php */

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\core\Application;

$app = new Application(dirname(__DIR__)); 
if($app->isAuth())
{
    $app->router->get('/', [SiteController::class, 'home']);
}
else
{
    $app->router->get('/', [AuthController::class, 'login']);
    $app->router->post('/', [AuthController::class, 'login']);
    $app->router->get('/register', [AuthController::class, 'register']);
    $app->router->post('/register', [AuthController::class, 'register']);
    $app->router->get('/contact', [SiteController::class, 'contact']);
    $app->router->post('/contact', [SiteController::class, 'handleContact']);    
}

$app->run();