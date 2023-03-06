<!-- OOPS and checking Part -->

<?php

  require 'vendor/autoload.php';

  use GuzzleHttp\Client;

?>

<?php
class Check {

  public $firstName;
  public $lastName;

  function __construct($firstName, $lastName) {
    $this->firstName = self::input($firstName);
    $this->lastName = self::input($lastName);
  }

  function firstNamecheck() {
    
    if(!preg_match("/^[A-Z]{1}[a-z]+$/",$this->firstName)) {
      
      $fnameErr = "First name should start with capital letter and should contain only alphabets";
      return $fnameErr;
      
    }
  
  }

  function lastNameCheck() {

    if(!preg_match("/^[A-Z]{1}[a-z]+$/",$this->lastName)) {
        
      $lnameErr = "Last name should start with capital letter and should contain only alphabets";
      return $lnameErr;
      
    }

  }

  function fullName() {
    return $this->firstName . " " . $this->lastName;
  }

  function uploadImage($filename, $tempname) {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($filename);
    move_uploaded_file($tempname, $target_file);
    $filepath = "uploads/".$filename;
    return $filepath;
  
  }

  function result($marksdata) {

    $subject = array();
    $marks = array();
    $lines = explode("\r\n", $marksdata);

    foreach($lines as $val) {
      if(preg_match('/^[a-zA-Z]+[|]{1}[0-9]{1,3}$/', $val)) {

        $data = explode("|", $val);
        array_push($subject,$data[0]);
        array_push($marks,$data[1]);
      
      }
      
      else {
        $_SESSION["marksErr"] = "Put in the format subject|marks.";
        break;
      }
    
    }
    
    $result = array_combine($subject,$marks);
    return $result;

  }

  function numberCheck($number) {

    if(preg_match('/^[0-9]{10}$/', $number)) {
      return $number;
    }

    else {
      $_SESSION["numberErr"] = "Phone number should be of 10 digits";
    }

  }

  function emailCheck($email) {

    // $curl = curl_init();
    
    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$email,
    //   CURLOPT_HTTPHEADER => array(
    //     "Content-Type: text/plain",
    //     "apikey: 7qgDJ6nDyaxddvIxYnB13x39ztMT09TV"
    //   ),
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "GET"
    //   )
    // );
    
    // $response = curl_exec($curl);
    
    // curl_close($curl);
    // $validationResult = json_decode($response, true);
    // $flag=true;
    // if ($validationResult['format_valid']==false || $validationResult['smtp_check']==false) {
    //   $flag=false;
    // }
    // curl_close($curl);

    // if($flag==false) {
    //   $_SESSION["emailErr"] = "Enter your Email-ID in proper format";
    // }

    // else {
    //   return $email;
    // }

    $client = new Client ([
      // Creating client using base uri.
      'base_uri' => 'https://api.apilayer.com',
    ]);
    
    // Sending request to https://api.apilayer.com/email_verification/check?email=.
    $response = $client->request('GET', '/email_verification/check?email=' . $email, [
      "headers" => [
        'Content-Type' => 'text/plain',
        'apikey' => '7qgDJ6nDyaxddvIxYnB13x39ztMT09TV'
      ]
    ]);

    // Retrieving body of the response using getBody() method.
    $body = $response->getBody();
    // Converting JSON data to object.
    $object = json_decode($body);
    $flag = true;

    if($object->format_valid && $object->smtp_check) {
      $flag = true;
    }

    else {
      $flag = false;
    }

    if($flag == false) {
      $_SESSION["emailErr"] = "Enter your Email-ID in proper format";
    }

    else {
      return $email;
    }
    
  }

  public static function input($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  }

}
?>