<?php
/* core/Request.php */

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $path = explode('/', $path);
        // $position = strpos($path,'?');
        // if($position === false)
        // {
        //     echo $path;
        //     return $path;
        // }
        // return substr($path, 0, $position);
        return '/'.$path[1];
    }

    public function Method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }    

    public function isGet()
    {
        return $this->Method() === 'get';
    }

    public function isPost()
    {
        return $this->Method() === 'post';
    }    

    public function getBody()
    {
        $body = [];
        if($this->Method() === 'get')
        {
            foreach($_GET as $key => $value)
            {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->Method() === 'post')
        {
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}