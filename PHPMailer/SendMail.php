<?php
  
  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  class SendMail {

    public function sendMail($email) {
      
      $mail = new PHPMailer(true);
      
      try {

        //Server settings

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 1;
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rupam251201@gmail.com';                     //SMTP username
        $mail->Password   = 'wgfgfwucuuofwpou';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients

        //Set email-ID from which mail will be sent
        $mail->setFrom('rupam251201@gmail.com', 'Rupam Saha');
        //Add a recipient
        $mail->addAddress($email);

        //Content

        //Set email format to HTML
        $mail->isHTML(true);
        $mail->Subject = 'Welcome';
        $mail->Body    = '<b>Thank you for your submission.</b>';

        $mail->send();
        echo 'Message has been sent';

      }
      
      catch (Exception $e) {
        
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      
      }
    
    }

    public function emailCheck($email) {

      $curl = curl_init();
      
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$email,
        CURLOPT_HTTPHEADER => array(
          "Content-Type: text/plain",
          "apikey: 7qgDJ6nDyaxddvIxYnB13x39ztMT09TV"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
        )
      );
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      $validationResult = json_decode($response, true);
      $flag=true;
      if ($validationResult['format_valid']==false || $validationResult['smtp_check']==false) {
        $flag=false;
      }
      curl_close($curl);
  
      if($flag==false) {

        $_SESSION["emailErr"] = "Enter your Email-ID in proper format";
      
      }
  
      else {

        return $flag;

      }
  
    }

  }

?>