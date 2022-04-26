<?php
/* public/index.php */

use Dotenv\Dotenv;
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new Application(dirname(__DIR__)); 
if($app->isAuth())
{
    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/logout', [SiteController::class, 'logout']);
    $app->router->get('/senderslist', [SiteController::class, 'senderslist']);
}
else
{
    $app->router->get('/', [AuthController::class, 'login']);
    $app->router->post('/', [AuthController::class, 'login']);
}
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);    

$app->run();