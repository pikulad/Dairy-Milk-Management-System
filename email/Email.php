<?php
/**
 * Created by PhpStorm.
 * User: hardik
 * Date: 19/01/18
 * Time: 7:13 AM
 */

include 'email/PHPMailerAutoload.php';

class Email
{
    static public function send($from,$subject,$message,$to)
    {
        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'smtp.gmail.com';
        $mail ->Port = 465;
        $mail ->IsHTML(true);
        $mail ->Username = "customer.dudhwala@gmail.com";
        $mail ->Password = "Priyanklad7";
        $mail ->SetFrom($from);
        $mail ->Subject = $subject;
        $mail ->Body = $message;
        $mail ->AddAddress($to);

        if(!$mail->Send())
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}