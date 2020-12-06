<?php

require_once 'constant.php';

// swiftmailer lib 

require_once 'vendor/autoload.php';

// Create the Transport(Our email server)
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASS)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// send verification email function

function sendVerificationEmail($email, $token){

  global $mailer;

  // Email body
  $body = '<!DOCTYPE html>
          <html>
              <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                  <title>Confirm email address</title>
                </head>
              <body>
                  <div class="wrapper">
                      <p>
                          Thank you for signup to our page! Please click on the link below to confirm your email address:
                      </p>
                      <a href="http://localhost/Typing/index.php?token=' .$token. '">Confirm your email address</a>
                  </div>
              </body>
          </html>';

  // Create a message
  $message = (new Swift_Message('Confirm your email address'))
  ->setFrom(EMAIL)
  ->setTo($email)
  ->setBody($body, 'text/html')
  ;

  // Send the message
  $result = $mailer->send($message);

}

function sendPasswordResetLink($email, $token){
  global $mailer;

  // Email body
  $body = '<!DOCTYPE html>
          <html>
              <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                  <title>Reset your password</title>
                </head>
              <body>
                  <div class="wrapper">
                      <p>
                          Click on the link below to reset your password:
                      </p>
                      <a href="http://localhost/Typing/index.php?password-token=' .$token. '">Reset your password</a>
                  </div>
              </body>
          </html>';

  // Create a message
  $message = (new Swift_Message('Reset your password'))
  ->setFrom(EMAIL)
  ->setTo($email)
  ->setBody($body, 'text/html')
  ;

  // Send the message
  $result = $mailer->send($message);
}

?>