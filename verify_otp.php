<?php 
session_start();

$alert = ""; // Define $alert with an empty string


//check if OTP is received

if (isset($_SESSION['verification_otp'])) {
    global  $alert;
    $verification_otp = $_SESSION['verification_otp'];
    // $userpass = $_SESSION['password'];
    $alert =  $verification_otp;
      

  
} else {
    // Handle case when OTP is not received
    $alert = "OTP is not received";
  
}


// Check if the submit  button is clicked
if (isset($_POST['submit'])) {
   
    // Get the OTP entered by the user from the form
    $otp = $_POST['otp'];

    // Check if the entered OTP matches the stored OTP
    if ($verification_otp == $otp) { 
        global  $alert;
        include "send_confirm.php";
     
        $alert = "OTP verified successfully";
       
        
    } else {
     
        global  $alert;
        $alert ="Invalid OTP";
    }
}

// Check if the resend button is clicked
if (isset($_POST['resend'])) {
  include "send_otp_fun.php";
  
  global  $alert;
  $alert ="Email Resend successfully"; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@700&family=Figtree:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/send_otp.css">
    
</head>

<body>
    <div class="container">
        <div class="pic2"></div>
        <img   style=" background-color: #1B2133; width: 80px; height: 90px;   "  src="https://adityahansda.github.io/gpkhutri/image/gp-khutri-logo-Main.png" alt="">
       
        <h1>Otp Verfiy !</h1>
<span style="color: red;  font-family: Arial, Helvetica, sans-serif;   font-weight: 900;"><?php      echo  $alert; ?></span>
        
        <form  method="POST">
            <div class="inp">
                <input type="number" id="otp" name="otp"  placeholder="Enter OTP">
            </div>
            <button name="submit" type="submit">Submit</button>
            <div style=" margin-top: 20px;  ">
            <!-- <button  id="resendButton" name="resend" type="Submit">Resend OTP</button> -->
            </div>
          
        </form>

      
    </div>
    <div class="pic">
    </div>
</body>





