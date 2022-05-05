<?php
/* migrations/Migration.php */

namespace app\migrations;
use app\core\Database;
use \PDO;

class Migration 
{
    public Database $con;

    public function __construct()
    {
        $this->con = new Database();
    }

    public function CreateTables()
    {
        $dbRequest = $this->con->pdo->prepare('
                                CREATE TABLE `users` (
                                    `id` int(11) NOT NULL,
                                    `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                    `lastname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                    `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                    `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                                ALTER TABLE `users`
                                ADD PRIMARY KEY (`id`);
                                CREATE TABLE `senders` (
                                    `id` int(11) NOT NULL,
                                    `name` varchar(100) NOT NULL,
                                    `email` varchar(200) NOT NULL,
                                    `description` varchar(100) DEFAULT NULL,
                                    `signature` longtext DEFAULT NULL,
                                    `host` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                    `smtp_auth` tinyint(1) NOT NULL,
                                    `username` varchar(150) NOT NULL,
                                    `password` varchar(150) NOT NULL,
                                    `port` int(10) NOT NULL,
                                    `from_field` varchar(200) DEFAULT NULL,
                                    `replyto` varchar(200) DEFAULT NULL
                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                                  ALTER TABLE `senders`
                                ADD PRIMARY KEY (`id`);      
                                CREATE TABLE `groups` (
                                    `id` int(11) NOT NULL,
                                    `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                                  ALTER TABLE `groups`
                                  ADD PRIMARY KEY (`id`);       
                                  CREATE TABLE `emails` (
                                    `id` int(11) NOT NULL,
                                    `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                    `id_group` int(11) NOT NULL
                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                                  ALTER TABLE `emails`
                                  ADD PRIMARY KEY (`id`);
                                  CREATE TABLE `archives` (
                                    `id` int(11) NOT NULL,
                                    `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                                    `id_senders` int(11) NOT NULL,
                                    `id_groups` int(11) NOT NULL,
                                    `subject` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                                    `content` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;          
                                  ALTER TABLE `archives`
                                  ADD PRIMARY KEY (`id`);                                                                                                                                                                                                                   
        ');
        try {
            $dbRequest->execute();
            echo "Tables have been created.<br />";
            return true;
        }
        catch(PDOException $e) {
            echo 'Migration has faild: ' . $e->getMessage();
            return false;
        }
    }

    public function InsertTablesData()
    {
        $dbRequest = $this->con->pdo->prepare('
                                INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`) 
                                VALUES (1, "John", "Doe", "john@domainname.com", "dummypassword");
        ');
        try {
            $dbRequest->execute();
            echo "The data has been inserted.<br />";
            return true;
        }
        catch(PDOException $e) {
            echo 'Migration has faild: ' . $e->getMessage();
            return false;
        }

    }
}