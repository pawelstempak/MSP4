<?php

namespace app\core;
use Dotenv\Dotenv;
use \PDO;

class Database
{
    public $cred;
    public $pdo;

    public function __construct()
    {
        $this->cred = Dotenv::createImmutable(__DIR__ . '/..');
        $this->cred->load();
        
        try
        {
            $this->pdo = new PDO('mysql:host='.$_ENV['DB_URL'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_LOGIN'], $_ENV['DB_PASS'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //$_ENV = null;
            return $this->pdo;
        }
        catch(PDOException $e)
        {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
    }
}