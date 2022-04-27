<?php
/* models/SendersListModel.php */

namespace app\models;
use \PDO;
use app\core\Application;

class SendersModel
{
    public function SendSendersList()
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    SELECT id, name, email
                                    FROM senders
        ');
        $db_request->execute();
        
        $senderslist = $db_request->fetchAll(PDO::FETCH_ASSOC);

        return $senderslist;
    }
}