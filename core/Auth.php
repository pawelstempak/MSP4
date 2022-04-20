<?php

namespace app\core;

class Auth
{
    public const HIDDEN_HASH_VAR = '76y32rghfb72380g3287b239fbn23fb3278';

    public $email;
    public $id_hash;
    public $expire;

    public function __construct()
    {
        $_SESSION ?? session_start();
        $this->email = $_SESSION['email'] ?? '';
        $this->id_hash = $_SESSION['id_hash'] ?? '';
        $this->expire = $_SESSION['expire'] ?? '';
    }

    public function Authorization()
    {
        return sha1($this->email.self::HIDDEN_HASH_VAR)==$this->id_hash and $this->expire>time();
    }
}