<?php
/* models/SendersListModel.php */

namespace app\models;
use \PDO;

class SendersListModel
{
    public function SendSendersList()
    {
        $db_request = $this->con->pdo->prepare('
                                    SELECT id, name, description
                                    FROM senders
        ');
        $db_request->execute();
        
        return $db_request->fetchAll(PDO::FETCH_ASSOC);
    }
}