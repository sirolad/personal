<?php

  require_once('vendor/autoload.php');

  // use PHPMailer;

  $mail = new PHPMailer;

  // Email information
  $admin_email = "surajudeen.akande@andela.com";
  $email = $_POST['email'];
  $sender = $_POST['name'];
  $message = $_POST['message'];
  $subject = 'I need your expatise';

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPDebug = 2;
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'sirolad@gmail.com';                 // SMTP username
  $mail->Password = 'Sirolad01$';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom($email, 'Client Mail');
  $mail->addAddress($admin_email, 'Admin');
  $mail->isHTML(true);

  $mail->Subject = $subject;
  $mail->Body    = "Sender Email: ". $email ."<br />".
                    $message;


  if(!$mail->send()) {
      echo json_encode(['status_code' => $mail->ErrorInfo]);
  } else {
      echo json_encode(['status_code' => 200]);
  }

