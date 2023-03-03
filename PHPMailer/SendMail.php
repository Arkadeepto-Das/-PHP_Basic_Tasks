<?php
  
  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  /**
   * Checking Email-ID and sending a message to that Email-ID.
   * 
   * @method emailCheck()
   *  Check whether the Email-ID is correct or not.
   * @method sendMail()
   *  Send mail using PHPMailer.
   */

  class SendMail {

    /**
     * Check whether the Email-ID is correct or not.
     * 
     * @param string $email
     * Stores Email-ID.
     * 
     * @return boolean
     * If Email-ID is correct it will return true otherwise it will  return false.
     */

    public function emailCheck(string $email) {

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
  
      return $flag;
  
    }

    /**
     * Sends mail to the Email-ID.
     * 
     * @param string $email
     * Stores Email-ID.
     * 
     * @return void
     * Prints message whether mail is sent or not.
     */

    public function sendMail(string $email) {
      
      $mail = new PHPMailer(true);
      
      try {

        //Server settings.

        //Enable verbose debug output.
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
        //Send using SMTP.
        $mail->isSMTP();
        $mail->Mailer     = "smtp";
        $mail->SMTPDebug  = 1;
        //Set the SMTP server to send through.
        $mail->Host       = 'smtp.gmail.com';
        //Enable SMTP authentication.
        $mail->SMTPAuth   = true;
        //SMTP username.
        $mail->Username   = 'rupam251201@gmail.com';
        //SMTP password.
        $mail->Password   = 'wgfgfwucuuofwpou';
        //Enable implicit TLS encryption.
        $mail->SMTPSecure = 'tls';
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`.
        $mail->Port       = 587;

        //Recipients.

        //Set email-ID from which mail will be sent.
        $mail->setFrom('rupam251201@gmail.com', 'Rupam Saha');
        //Add a recipient
        $mail->addAddress($email);

        //Content.

        //Set email format to HTML.
        $mail->isHTML(true);
        $mail->Subject = 'Welcome';
        $mail->Body    = '<b>Thank you for your submission.</b>';

        //Sends mail.
        $mail->send();
        echo 'Message has been sent';

      }
      
      catch (Exception $e) {
        
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      
      }
    
    }

  }

?>