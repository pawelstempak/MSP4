<?php

namespace app\core;
use Dotenv\Dotenv;

class Auth
{
    public const HIDDEN_HASH_VAR = '76y32rghfb72380g3287b239fbn23fb3278';

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

    public function SignIn()
    {
        $env = Dotenv::createImmutable(__DIR__ . '/..');
        $env->load();
        return $_ENV;
    }
}