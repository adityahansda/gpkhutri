
<?php


    // Generate Random 6-Digit OTP
$verification_otp = random_int(1000, 9999);



$_SESSION['verification_otp'] = $verification_otp;


// To Remove unwanted errors
error_reporting(0);

// Add your connection Code
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



// Important Files (Please check your file path according to your folder structure)
require "Mailer/PHPMailer.php";
require "Mailer/SMTP.php";
require "MAiler/Exception.php";


// Email From Form Input
$send_to_email = $_POST["email"];
$send_to_name = $_POST["name"];
$roll = $_POST["roll"];
$ur_password = $_POST["password"];

$_SESSION['Email'] = $send_to_email;
$_SESSION['name'] = $send_to_name;
$_SESSION['roll'] = $roll;
$_SESSION['password'] = $ur_password;



function sendMail($send_to, $otp, $name, $roll, $ur_password) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "gpbrightup@gmail.com";
    $mail->Password = "rzvbcjnbcuyfrtgc";

    // Your email ID and Email Title
    $mail->setFrom("gpbrightup@gmail.com", "GpbrightUp");

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Account Activation code" . $otp;

      // You can change the Body Message according to your requirement!
      $mail->Body = '
      <html>
          <head>
              <style>
                  /* Define your CSS styles here */
                  body {
                      font-family: Arial, sans-serif;
                      background-color: #f2f2f2;
                      margin: 0;
                      padding: 20px;
                  }
                  .container {
                      max-width: 600px;
                      margin: 0 auto;
                      background-color: #fff;
                      border-radius: 10px;
                      padding: 40px;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  }
                  h1 {
                      color: #333;
                      text-align: center;
                  }
                  p {
                      color: #666;
                  }


                  img{
                     hight: 80px;
                     width: 90px

                  }
              </style>
          </head>
          <body>
              <div class="container">
                  <h1>Account Activation</h1>
                  <p>Hello, <strong>' . $name . '</strong></p>
                  <p>Roll Number : <strong>' . $roll . '</strong></p>
                  <p>Password : <strong>' . $ur_password. '</strong></p>
                  <p>Activate your account with OTP <span style="color: green; font-weight: bold; font-size: 20px; ">' . $otp . '</span></p>
                  <p>Thank you!</p>
              </div>
          </body>
      </html>
  ';

  // Additional HTML to style the email body
  $mail->isHTML(true);

    $mail->send();
}
sendMail($send_to_email, $verification_otp, $send_to_name, $roll, $ur_password);
header("Location: verify_otp.php");
exit();