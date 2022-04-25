<?php
/* controllers/SiteController.php */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\core\Auth;
use app\models\SendersListModel;

class SiteController extends Controller
{
    public function logout()
    {
        $user = new Auth();
        $user->SignOut();
        header('Location: /');       
    }

    public function senderslist()
    {   
        $senderslist = new SendersListModel();
        $senderslist->SendSendersList();
        $params = [
            'name' => 'Ocotpus Site'
        ];
        return $this->render('senderslist', $params);
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