<?php

namespace app\core;
use app\core\Database;

class Auth
{
    public const HIDDEN_HASH_VAR = '76y32rghfb72380g3287b239fbn23fb3278';
    public const SESSION_LIFE_TIME = '300';

    public $email;
    public $id_hash;
    public $expire;

    public function __construct()
    {
        $_SESSION ?? session_start();
    }

    public function Auth()
    {
        $this->email = $_SESSION['email'] ?? '';
        $this->id_hash = $_SESSION['id_hash'] ?? '';
        $this->expire = $_SESSION['expire'] ?? '';
        return sha1($this->email.self::HIDDEN_HASH_VAR)==$this->id_hash and $this->expire>time();
    }

    public function SetSession($post_email,$session_life_time)
    {
        $post_email=strtolower($post_email);
		$id_hash= sha1($post_email.self::HIDDEN_HASH_VAR);
		$_SESSION['email'] = $post_email;
		$_SESSION['id_hash'] = $id_hash;
		$_SESSION['expire'] = time()+$session_life_time;
    }

    private $con;

    public function SignIn($getBody)
    {
        $this->con = new Database();
            
        $db_request = $this->con->pdo->prepare('
                                    SELECT id, name, lastname, email, password 
                                    FROM users
                                    WHERE email = :email AND password = :password
        ');
        $db_request->execute(array(
                                    "email" => $getBody['email'],
                                    "password" => $getBody['password'],
        ));
        if($db_request->fetch())
        {
            $this->SetSession($getBody['email'],self::SESSION_LIFE_TIME);
            $this->Auth();
        }

        return true;
    }

    public function SignOut() 
    {
		unset($_SESSION['email']);
		unset($_SESSION['id_hash']);
		session_destroy();
	}
}