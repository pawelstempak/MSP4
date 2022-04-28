<?php
/* models/SendersListModel.php */

namespace app\models;
use \PDO;
use app\core\Application;

class SendersModel
{
    public function LoadSendersList()
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    SELECT id, name, email
                                    FROM senders
        ');
        $db_request->execute();
        
        $senderslist = $db_request->fetchAll(PDO::FETCH_ASSOC);

        return $senderslist;
    }

    public function SaveNewSender($getBody)
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    INSERT INTO `senders` (name, email, description, signature, host, smtp_auth, username, password, port, from_field, replyto)
                                    VALUES (:name, :email, :description, :signature, :host, :smtp_auth, :username, :password, :port, :from_field, :replyto)
        ');
        return $db_request->execute(
                array(
                    "name" => $getBody['name'],
                    "email" => $getBody['email'],
                    "description" => $getBody['description'],
                    "signature" => $getBody['signature'],
                    "host" => $getBody['host'],
                    "smtp_auth" => $getBody['smtp_auth'],
                    "username" => $getBody['username'],
                    "password" => $getBody['password'],
                    "port" => $getBody['port'],
                    "from_field" => $getBody['from_field'], 
                    "replyto" => $getBody['replyto']
                )
            );
    }    
}