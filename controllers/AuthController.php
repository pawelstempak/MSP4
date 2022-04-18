<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if($request->isPost())
        {
            $registerModel->loadData($request->getBody());

            var_dump($registerModel);

            if($registerModel->validate() && $regiterModel->register())
            {
                return 'Success';
            }
            
            // $firstname = $request->getBody()['firstname'];
            // if(!$firstname)
            // {
            //     $errors['firstname'] = 'This field is required.';
            // }
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }    
}