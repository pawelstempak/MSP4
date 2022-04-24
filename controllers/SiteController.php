<?php
/* controllers/SiteController.php */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\core\Auth;

class SiteController extends Controller
{
    public function logout()
    {
        $user = new Auth();
        $user->SignOut();
        header('Location: /');       
    }

    public function home()
    {   
        $params = [
            'name' => 'Ocotpus Site'
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {   
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitting data';
    }
}