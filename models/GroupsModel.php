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
                                    INSERT INTO `groups` (name)
                                    VALUES (:name)
        ');
        $db_request->execute(
            array(
                "name" => $getBody['name']
            )
        );
        $db_request = Application::$core->con->pdo->prepare('
                                    SELECT LAST_INSERT_ID()
        ');
        $db_request->execute();
        $db_response = $db_request->fetch();
        $lastinsertid = $db_response['LAST_INSERT_ID()'];
        
        $importfield = explode(' ',str_replace(PHP_EOL, ' ', str_replace('&#13;&#10;', ' ', $getBody['importfield'])));
        $prepared_sql = 'INSERT INTO `emails` (email, id_group) VALUES';
        foreach($importfield as $key)
        {
            $prepared_sql .= ' ("'.$key.'", "'.$lastinsertid.'"),';
        }
        $prepared_sql = substr($prepared_sql,0,strlen($prepared_sql)-1);
        $db_request = Application::$core->con->pdo->prepare($prepared_sql);
        $db_request->execute();
    }   
}