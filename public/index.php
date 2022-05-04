<?php
/* public/index.php */

// echo "<pre>";
// var_dump($params);
// echo "</pre>";

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
    $app->router->get('/newmailing', [SiteController::class, 'newmailing']);
    $app->router->post('/newmailing', [SiteController::class, 'newmailing']);
    $app->router->get('/groupslist', [SiteController::class, 'groupslist']);
    $app->router->get('/newgroup', [SiteController::class, 'newgroup']);
    $app->router->post('/newgroup', [SiteController::class, 'newgroup']);
    $app->router->get('/senderslist', [SiteController::class, 'senderslist']);
    $app->router->get('/editsender', [SiteController::class, 'editsender']);
    $app->router->post('/editsender', [SiteController::class, 'editsender']);
    $app->router->get('/newsender', [SiteController::class, 'newsender']);
    $app->router->post('/newsender', [SiteController::class, 'newsender']);    
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