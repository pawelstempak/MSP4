<?php
/* controllers/SiteController.php */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\core\Auth;
use app\models\SendersModel;
use app\models\GroupsModel;

class SiteController extends Controller
{
    public $senders;
    public $groups;

    public function __construct()
    {
        $this->senders = new SendersModel();
        $this->groups = new GroupsModel();
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

    public function logout()
    {
        $user = new Auth();
        $user->SignOut();
        header('Location: /');       
    }

    public function newmailing()
    {   
        $groupsList = $this->groups->LoadGroupsList();
        $params1 = [
            'groupslist' => $groupsList
        ];        
        $sendersList = $this->senders->LoadSendersList();
        $params2 = [
            'senderslist' => $sendersList
        ];      
        $params = array_merge($params1,$params2);  
        // echo "<pre>";
        // var_dump($params);
        // echo "</pre>";
        return $this->render('newmailing', $params);
    }

    public function groupslist()
    {   
        $groupsList = $this->groups->LoadGroupsList();
        $params = [
            'groupslist' => $groupsList
        ];        
        return $this->render('groupslist', $params);
    }

    public function newgroup(Request $request)
    {   
        if($request->isPost())
        {
            $this->groups->SaveNewGroup($request->getBody());
        }
        return $this->render('newgroup');
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
}