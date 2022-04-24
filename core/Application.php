<?php
/* core/Application.php */

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $core;
    public Controller $controller;
    public Auth $auth;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        
        self::$core = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->auth = new Auth();
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController()
    {
        $this->controller;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function isAuth()
    {
        return $this->auth->Auth();
    }
}