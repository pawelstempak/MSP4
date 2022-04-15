<?php

namespace app\controllers;
use app\core\Request;

class SiteController 
{
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitting data';
    }
}