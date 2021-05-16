<?php

  $from = htmlspecialchars($_POST['usermail']);
  $usermessage = htmlspecialchars($_POST['message']);

  function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }
  $to_email = 'DeineMail@gmail.com';
  $subject = 'Der Titel der Mail';
  $message = 'Absender Email: ' .$from. "\r\n". "\r\n". 'Nachricht: '. "\n\r". $usermessage;
  $headers = 'Von: '.$from;
  //Überprüfe ob die email verfügbar ist
  $secure_check = sanitize_my_email($to_email);
  if ($secure_check == false) {
    echo "Invalid Input";
  }else { 
    mail($to_email, $subject, $message, $headers);
    echo "Email wurde Abgeschickt";
  }

?>
