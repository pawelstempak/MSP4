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
        $sendersList = $this->senders->SendSendersList();
        $params = [
            'senderslist' => $sendersList
        ];
        return $this->render('senderslist', $params);
    }

    public function editsender()
    {   
        // $senderslist = new SendersModel();
        // $list = $senderslist->SendSenders();
        // $params = [
        //     'editsender' => $list
        // ];
        return $this->render('editsender');
    }    

    public function newsender(Request $request)
    {   
        if($request->isPost())
        {
            //$saveNewSender = $this->senders->SaveNewSender();
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