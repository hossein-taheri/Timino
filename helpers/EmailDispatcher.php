<?php

namespace Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailDispatcher
{
    public function send($emails, $subject, $body)
    {
        $email = $GLOBALS['config']['email'];
        $phpmailer = new PHPMailer(true);
        $phpmailer->isSMTP();
        $phpmailer->Host = $email['host'];
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = $email['port'];
        $phpmailer->Username = $email['username'];
        $phpmailer->Password = $email['password'];
        $phpmailer->Sender = $email['sender'];

        $phpmailer->setFrom($email['sender']);

        foreach ($emails as $email) {
            $phpmailer->addAddress($email);
        }

        $phpmailer->isHTML(true);                                  //Set email format to HTML
        $phpmailer->Subject = $subject;
        $phpmailer->Body = $body;
        $phpmailer->send();
    }
}
