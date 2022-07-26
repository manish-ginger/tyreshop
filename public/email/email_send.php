<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";




$succes_msg=$err_msg='';
$name=$email_id=$phone=$q_id=$date=$message='';
$name_err=$email_id_err=$phone_err=$q_id_err=$date_err=$message_err='';
if (isset($_POST['book_now_btn'])){  
  $name=$_POST['name'];
  $email_id=$_POST['email'];
  $phone=$_POST['phone'];
  $q_id=$_POST['Q_id'];
  $date=$_POST['date'];

    //Phone Validation
    if($name==""){
    $name_err="Name Is Required"; 
    }
    if (!preg_match ("/^[0-9]*$/", $phone) ){  
    $phone_err = "Only Numbers Allowed.";  
    } 
    $length = strlen ($phone);  
    if ( $length < 8 || $length > 8) {  
    $phone_err = "Mobile must have 8 digits.";  
    }
    $q_id_length = strlen ($q_id);  
    if ( $q_id_length < 11 || $q_id_length> 11) {  
    $q_id_err = "Q ID must have 11 digits.";  
    }
    if($date==""){
       $date_err="Date Is Required"; 
    }
    else if (strtotime($date) == false){
        $date_err="Check The Date format"; 
    }

    if($name_err=="" && $phone_err=="" && $q_id_err=="" && $date_err==""){
      $succes_msg="Your Appoinment Request Send Successfully.We will Contact Soon";
        $subject="Appoinment Request";
        send_to_owner($subject,$name,$email_id,$phone,$q_id,$date,$message);
    }
    else{
    $succes_msg="";
    }
}

if (isset($_POST['sample_collection'])){
  $name=$_POST['name'];
  $email_id=$_POST['email'];
  $phone=$_POST['phone'];
  $q_id=$_POST['Q_id'];
  $date=$_POST['date'];
  $message=$_POST['message'];

    //Phone Validation
    if (!preg_match ("/^[0-9]*$/", $phone) ){  
    $phone_err = "Only Numbers Allowed.";  
    } 
    $length = strlen ($phone);  
    if ( $length < 8 || $length > 8) {  
    $phone_err = "Mobile must have 8 digits.";  
    }
    $q_id_length = strlen ($q_id);  
    if ( $q_id_length < 11 || $q_id_length> 11) {  
    $q_id_err = "Q ID must have 11 digits.";  
    }
    if($name_err=="" && $phone_err=="" && $q_id_err=="" && $email_id_err==""){
      $succes_msg="Your Sample Collection  Request Send Successfully.We will Contact Soon";
        $subject="Sample Collection Request";
        send_to_owner($subject,$name,$email_id,$phone,$q_id,$date,$message);
    }
    else{
    $succes_msg="";
    }
}
if (isset($_POST['contact_form'])){
  $name=$_POST['name'];
  $email_id=$_POST['email'];
  $phone=$_POST['phone'];
  $company=$_POST['company'];
  $Home_address=$_POST['Home'];
  $message=$_POST['message'];
  
  //name Validation
//   if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
//     $name_err = "Only alphabets and whitespace are allowed.";  
//     }
    
    //Email Validation
    // $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    // if (!preg_match ($pattern, $email) ){  
    // $email_id_err = "Email is not valid.";  
    // }
    //Phone Validation
    if (!preg_match ("/^[0-9]*$/", $phone) ){  
    $phone_err = "Only Numbers Allowed.";  
    } 
    $length = strlen ($phone);  
    if ( $length < 8 || $length > 8) {  
    $phone_err = "Mobile must have 8 digits.";  
    }
    if($name_err=="" && $phone_err=="" &&  $email_id_err==""){
      $succes_msg="Your Form Submitted  Successfully.We will Contact Soon";
      $subject="Contact Message";
        send_to_owner($subject,$name,$email_id,$phone,$q_id,$date,$message);

    }
    else{
    $succes_msg="";
    }
}





function send_to_owner($subject="",$name="",$email_id="",$phone="",$q_id="",$date="",$message=""){
$htmlContent = '<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#ffffff">
                            <div style="display:inline-block;  min-width:100px; vertical-align:top;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                            <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;"><a href="#" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="https://alphalabsqatar.com/email/images/image-5.png"  style="display: block; border: 0px;" /></a></h1>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                <tr>
                                                    <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                                     
                                                    </td>
                                                    <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://alphalabsqatar.com/email/images/calendar.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> '.$subject.' </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td colspan="2"  align="left" bgcolor="#eeeeee" style="text-align: center;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Details </td>
                                                <!--<td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"></td>-->
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> Name </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">'.$name.'</td>
                                            </tr>';
                                if($email_id){
                              $htmlContent=$htmlContent.'
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Email </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">'.$email_id.'</td>
                                            </tr>';
                                }
                                if($phone){
                                 $htmlContent=$htmlContent .'<tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Phone </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">'.$phone.'</td>
                                            </tr>';
                                }  
                                if($date){
                                $htmlContent=$htmlContent .'<tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Date </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">'.$date.'</td>
                                            </tr>';
                                        }
                                      if($q_id){
                                        $htmlContent=$htmlContent .' <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Q ID </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">'.$q_id.'</td>
                                            </tr>';
                                      }
                                      if($message){
                                         $htmlContent=$htmlContent .'<tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Message </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">'.$message.'</td>
                                            </tr>';
                                      }
                                        $htmlContent=$htmlContent .'</table>
                                    </td>
                                </tr>
                               
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                        
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                        <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;"> Doha<br> Qatar </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                    
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>'; 
// // Set content-type header for sending HTML email 
// $headers = "MIME-Version: 1.0" . "\r\n"; 
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// // Additional headers 
// $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
// // $headers .= 'Cc: welcome@example.com' . "\r\n"; 
// // $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
 
// // Send email 
// if(mail($to, $subject, $htmlContent, $headers)){ 
// }else{ 
//     $err_msg="something Went Wrong";
// }

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 1;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "smtpredlimousineqa@gmail.com";                 
$mail->Password = "access@redlimousine";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                            

$mail->From = "smtpredlimousineqa@gmail.com";
$mail->FromName = "Red-Limousine";

$mail->addAddress("info@alphalabsqatar.com", "Recepient Name");
// $mail->addAddress("rakhilpanapuzha@gmail.com", "Recepient Name");
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $htmlContent;
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    // echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
}


?>