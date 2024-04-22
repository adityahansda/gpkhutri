
<?php


// Add your connection Code

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$email = $_SESSION['Email'];
$name = $_SESSION['name'];
$user_roll = $_SESSION['roll'];
$user_password = $_SESSION['password'];

///-----------------------------database------------------

$servername = "localhost";
$username = "root";
$password = "gpkhutri";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $user_roll;   
    $email_id = $email;
    $stu_name = $name ;
    $ur_password = $user_password;


    // Insert data into students table
    $sql = "INSERT INTO student (idStudent, email, name, password) VALUES ('$roll', '$email_id', '$stu_name', '$ur_password')";


    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();


////-----------------------------------------------database-------------------------------------------








// Important Files (Please check your file path according to your folder structure)
require "Mailer/PHPMailer.php";
require "Mailer/SMTP.php";
require "MAiler/Exception.php";


// Email From Form Input
$send_to_email = $email;



// Full Name of User
$send_to_name = $name;
$roll = $user_roll;

function sendMail($send_to, $otp, $name, $roll,$user_password) {
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
    $mail->Subject = "Account Active successfully ! ";

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

 
                  <h1>Account Active</h1>
                  <p>Hello, <strong>' . $name . '</strong></p>
                  <p>Roll Number : <strong> ' . $roll . '</strong></p>
                  <p>Login Password : <strong>' . $user_password . '</strong></p>
                  <p>Registration is successfully done!</p>
                  <p>Thank you!</p>
              </div>
          </body>
      </html>
  ';

  // Additional HTML to style the email body
  $mail->isHTML(true);

    $mail->send();
}

sendMail($send_to_email, $verification_otp, $send_to_name, $roll,$user_password);



header("Location: dashboard.php");
exit();


