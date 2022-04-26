<?php
/* models/SendersListModel.php */

namespace app\models;
use \PDO;
use app\core\Application;

class SendersListModel
{
    public function SendSendersList()
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    SELECT id, name, description
                                    FROM senders
        ');
        $db_request->execute();
        
        return $db_request->fetchAll(PDO::FETCH_ASSOC);
    }
}