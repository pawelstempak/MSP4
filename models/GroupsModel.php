<?php
/* models/GroupsModel.php */

namespace app\models;
use \PDO;
use app\core\Application;

class GroupsModel
{
    public function LoadGroupsList()
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    SELECT id, name
                                    FROM groups
        ');
        $db_request->execute();
        
        $groupslist = $db_request->fetchAll(PDO::FETCH_ASSOC);

        return $groupslist;
    }

    public function SaveNewGroup($getBody)
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    INSERT INTO `senders` (name)
                                    VALUES (:name)
        ');
        return $db_request->execute(
                    array(
                        "name" => $getBody['name']
                    )
                );
    }
    
    public function LoadSender($getBody)
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    SELECT id, name, email, description, signature, host, smtp_auth, username, password, port, from_field, replyto
                                    FROM `senders`
                                    WHERE id = :id
        ');
        $db_request->execute(array("id" => $getBody['block1']));
        
        $sender = $db_request->fetch(PDO::FETCH_ASSOC);

        return $sender;
    }    
}