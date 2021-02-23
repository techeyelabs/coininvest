<?php

//  $parse =  explode("?", $_SERVER['REQUEST_URI']);
//     //print_r($parse);
//     $intro_name = count($parse) > 0 ? $parse[1] : ''; 
//      if (count($parse) > 0 ){
//       $islogindialogparse = explode("&", $parse[1]);
//       $flagParse = $islogindialogparse[1];
       
//       //print_r($islogindialogparse);
//       if ($flagParse) {
//           $flagParse = explode("=", $flagParse);
//           $flag = $flagParse[1];
//           if ($flag) {
//              echo '<input type="hidden" value="'. $intro_name .'" id="flagParam" name="flagParam" />';
//           }
//       }
//      }

// exit();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require(__DIR__ . "/mail/mailer/src/Exception.php");
require(__DIR__ . "/mail/mailer/src/SMTP.php");
require(__DIR__ . "/mail/mailer/src/PHPMailer.php");


function mailSeindingTest() {

    try{
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "AtKinSons000@gmail.com";
        $mail->Password   = "Asl@56789";
        $mail->IsHTML(true);
        //$mail->AddAddress("john4apps27@gmail.com", "Bashar Vay");
        $mail->AddAddress("khokon_85seu@hotmail.com", "Bashar Vay");
        $mail->SetFrom("info@atkinsons.com", "AtKinSons");
        $mail->AddReplyTo("info@atkinsons.com", "AtKinSons");
        //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = "Password Reset";
        $content = "<b>This is a Test Email sent via SMTP .</b>";
        $mail->MsgHTML($content);
       // $mail->Send();
        
        //var_dump($mail);
        
        if(!$mail->Send()) {
          echo "Error while sending Email.";
         //  var_dump($mail);
        } else {
          echo "Email sent successfully";
        }
    
    }
    catch (Exception $e)
    {
       echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
       echo $e->getMessage();
    }

}

mailSeindingTest();