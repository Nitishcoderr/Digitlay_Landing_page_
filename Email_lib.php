<?php
require_once 'php_mailer/src/PHPMailer.php';
require_once 'php_mailer/src/SMTP.php';
require_once 'php_mailer/src/Exception.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

CLass Email {
    private $user_name="support@digitlay.com"; //SET SMTP User Name
    private $password = "BqtaA%?VoUIN";//SET SMTP Password

    public function sendMail($to,$subject,$body){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.digitlay.com';                 //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->user_name;                       //SMTP username
            $mail->Password   = $this->password;                        //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('support@digitlay.com', 'Digitlay');
            $mail->addAddress($to);     //Add a recipient
            $mail->addReplyTo('saurabh@digitlay.com', 'Digitlay');
            $mail->addBCC('saurabh@digitlay.com');
             $mail->addBCC('shiv@digitlay.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
           // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
           
            $mail->msgHTML($body);
            
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            return TRUE;
        } catch (Exception $e) {
           // return $mail->ErrorInfo;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }




    }

}




?>