<?php 
//require_once 'Email_lib.php';

$response=array('status'=>401,'message'=>"Something went wrong, Please try again later !!");

if($_POST){
    // Set the HTML body using the template
    // $htmlTemplate = file_get_contents('my_mailer.php');
    // // Replace the placeholders in the template with the dynamic values
    // $htmlTemplate = str_replace("{NAME}", $_POST['name'], $htmlTemplate);
    // $htmlTemplate = str_replace("{EMAIL}", $_POST['email'], $htmlTemplate);
    // $htmlTemplate = str_replace("{PHONE}", $_POST['phone'], $htmlTemplate);
    // $htmlTemplate = str_replace("{MESSAGE}", $_POST['message'], $htmlTemplate);

    // $Mail=new Email();
    
    
    //  $htmlTemplateUser = file_get_contents('user_mailer.php');
   

    // $Mail=new Email();
           $recipientEmail = 'saurabh@digitlay.com'; 
     // Send email notification to the site admin 
                $to = $recipientEmail; 
                $subject = 'New Lead From Website'; 
                $htmlContent = " 
                    <h4>Contact request details</h4> 
                    <p><b>Name: </b>".$_POST['name']."</p> 
                    <p><b>Email: </b>".$_POST['email']."</p> 
                    <p><b>Mobile Number: </b>".$_POST['phone']."</p> 
                    <p><b>Message: </b>".$_POST['message']."</p> 
                    <p><b>Thanks Digitlay Team,</b></p>
                    
                "; 
                 
                // Always set content-type when sending HTML email 
                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // More headers 
                $headers .= 'From:'.$_POST['name'].' <'.$_POST['email'].'>' . "\r\n"; 
                $headers .= 'CC: shiv@digitlay.com' . "\r\n";
                $headers .= 'CC: rajesh@digitlay.com' . "\r\n";
                 
                // Send email 
               $status = mail($to, $subject, $htmlContent, $headers); 
                //Something to write to txt log
                    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
                           
                            "Name: ".$_POST['name'].PHP_EOL.
                            "Email: ".$_POST['email'].PHP_EOL.
                            "Mmobile Number: ".$_POST['phone'].PHP_EOL.
                            "Message: ".$_POST['message'].PHP_EOL.
                            "Mail Status: ".$status.PHP_EOL.
                            "-------------------------".PHP_EOL;
                    //Save string to log, use FILE_APPEND to append.
                    file_put_contents('./app_development_log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
               
               /*Client Reply*/
               // Send email notification to the site admin 
                $toClient = $_POST['email']; 
                $subjectClient = 'Digitlay:Thanks for contacting us'; 
                $htmlContentClient = "
                    <p><br>Thanks for contacting us</b></p>
                    <p>One of our representatives will contact you shortly.</p> 
                    <p></p>
                    <p><b>Thanks Digitlay Team,</b></p>
                    <p>Mobile Number: +91 9910662191</P>
                    <p>Email:info@digitlay.com</p>
                "; 
                 
                // Always set content-type when sending HTML email 
                $headersClient = "MIME-Version: 1.0" . "\r\n"; 
                $headersClient .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // More headers 
                $headersClient .= 'From:Info <info@digitlay.com>' . "\r\n"; 
                 
                // Send email 
               $status = mail($toClient, $subjectClient, $htmlContentClient, $headersClient); 
    
    
    if($status){
      
        $response=array('status'=>200,'message'=>"Thank You For Contacting Us. We will get back to you soon.");
    }else{
        $response=array('status'=>401,'message'=>"Something wrong with email server.Please try after sometime.");
    }
}

echo json_encode($response);die;
?>