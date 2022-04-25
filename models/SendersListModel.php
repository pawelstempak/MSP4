<?php
/* models/SendersListModel.php */

namespace app\models;
use Dotenv\Dotenv;
use app\core\Database;
use \PDO;

class SendersListModel
{
    private $con;

    public function __constructor()
    {
        $this->cred = Dotenv::createImmutable(__DIR__ . '/..');
        $this->cred->load();    
    }

    public function SendSendersList()
    {
        $this->con = new Database();
            
        $db_request = $this->con->pdo->prepare('
                                    SELECT id, name, description
                                    FROM senders
        ');
        $db_request->execute();
        
        return $db_request->fetchAll(PDO::FETCH_ASSOC);
    }
}