<?php
/* models/MailingModel.php */

namespace app\models;
use \PDO;
use app\core\Application;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailingModel
{
    public function SaveNewMailing($senderId, $groupId, $subject, $content)
    {
        $db_request = Application::$core->con->pdo->prepare('
                                    INSERT INTO `archives` (id_senders, id_groups, subject, content)
                                    VALUES (:id_senders, :id_groups, :subject, :content)
        ');
        $db_request->execute(
            array(
                "id_senders" => $senderId,
                "id_groups" => $groupId,
                "subject" => $subject,
                "content" => $content
            )
        );
    }

    public function getSender($senderId)
    {
        $db_request = Application::$core->con->pdo->prepare('
                                                            SELECT *
                                                            FROM senders
                                                            WHERE id = :id
        ');
        $db_request->execute(
                                array(
                                    "id" => $senderId
                                )
        );
        return $db_request->fetch(PDO::FETCH_ASSOC);

    }

    public function getReciepientsList($groupId)
    {
        $db_request = Application::$core->con->pdo->prepare('
                                                            SELECT email, id
                                                            FROM emails
                                                            WHERE id_group = :id
        ');
        $db_request->execute(
                                array(
                                    "id" => $groupId
                                )
        );
        return $db_request->fetchAll(PDO::FETCH_ASSOC);

    }    

    public function SendNewMailing(array $getBody)
    {


        $cSender = $this->getSender($getBody['id_sender']);

        $cGroups = $this->getReciepientsList($getBody['id_group']);

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->CharSet = "UTF-8";
            $mail->Encoding = 'base64';
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $cSender['host'];                       //Set the SMTP server to send through
            $mail->SMTPAuth   = $cSender['smtp_auth']==1? true : false;                                   //Enable SMTP authentication
            $mail->Username   = $cSender['username'];                     //SMTP username
            $mail->Password   = $cSender['password'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $cSender['port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($cSender['email'], $cSender['name']);
            foreach($cGroups as $key)
            {
                $mail->addAddress($key['email']);               //Name is optional                
            }
            $mail->addReplyTo($cSender['replyto'], $cSender['name']);

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $getBody['subject'];
            $mail->Body    = $getBody['content'];
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            
            $this->SaveNewMailing($getBody['id_sender'], $getBody['id_group'], $getBody['subject'], $getBody['content']);

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }   
}