<?php

namespace app\core;

class Controller 
{
    public string $layout;
    public function setLayout($layout = 'main')
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$core->router->renderView($view, $params);
    }
}