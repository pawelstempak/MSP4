<?php
/* controllers/SiteController.php */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\core\Auth;
use app\models\SendersModel;

class SiteController extends Controller
{
    public $senders;

    public function __construct()
    {
        $this->senders = new SendersModel();
    }

    public function logout()
    {
        $user = new Auth();
        $user->SignOut();
        header('Location: /');       
    }

    public function senderslist()
    {   
        $sendersList = $this->senders->LoadSendersList();
        $params = [
            'senderslist' => $sendersList
        ];
        return $this->render('senderslist', $params);
    }

    public function editsender(Request $request)
    {   
        $sender = $this->senders->LoadSender($request->getBody());
        $params = [
            'sender' => $sender
        ];
        return $this->render('editsender', $params);
    }    

    public function newsender(Request $request)
    {   
        if($request->isPost())
        {
            $this->senders->SaveNewSender($request->getBody());
        }
        return $this->render('newsender');
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