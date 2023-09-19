<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <title>Document</title>
    <script src="form.js"></script>
    <script src="https://kit.fontawesome.com/5f18765c61.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container">
        <main class="signup-container">
            <p class="text-mute">STUDENT SIGN IN FORM</p>
            <h1 class="heading-primary">Sign In Account<span class="custom-dot">.</span></h1>
            <p class="text-mute">Already A Member? <a href="Register.php">Sign in</a></p>
            <p class="text-mute">Back To Home  <a href="index.html">Home</a></p>
            <!------------------------------------------------------------->
            <form class="signup-form"  method="POST">
                <div class="f-row input-wrapper">
                   
                    
                </div>
                <label class="inp">
                    <input maxlength="11"  type="text" name="roll" class="input-text" placeholder="&nbsp;">
                    <span   class="label">Roll</span>
                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </label>
                
                <label class="inp">
                    <input type="password" name="password" class="input-text" placeholder="&nbsp;" id="password">
                    <span class="label">Password</span>
                    <span class="input-icon input-icon-password" data-password><i class="fa-solid fa-eye"></i></span>
                </label>
                <button type="submit" class="btn btn-signup">Create account</button>
            </form>
            
        </main>
        <div class="welcome-container">
            <h1 class="heading-secondary">Welcome to </h1>
            <span class="lg"> Govt. Polytechnic Khutri, Bokaro</span>
            <img src="https://png2.cleanpng.com/sh/82506800d9e08bf14cb0a38d53322fea/L0KzQYm3VsI1N6Rug5H0aYP2gLBuTfxieKV0iJ9taYPzfLLCTfRmfppofZ92dXz3eb7shPliNZ1miOZ4cD3wf7TylgAuPZM3fqNsMEC4RIKAUsQvOmU5SaUBMkm0RYOCWME1OGI7S6Y9NT7zfri=/kisspng-laptop-display-device-multimedia-laptop-mockup-5b2f1c00541724.2441362915298140163445.png"
                alt="">
        </div>
    </div>

</body>

</html>



 

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $roll = $_POST["roll"];
  $password = $_POST["password"];

  // Validate input
  if (empty($roll)) {
    $error_message = "Roll is required";
  } else if (strlen($roll) != 11) {
    $error_message = "Roll must be 11 characters";
  } else if (empty($password)) {
    $error_message = "Password is required";
  } else {
    

    $conn = mysqli_connect("localhost", "root", "", "urs");

    $roll = mysqli_real_escape_string($conn, $roll);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM usrdt WHERE roll = '$roll' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
      // User is valid, redirect to dashboard
      header("Location: dasboard.html");
      exit();
    } else {
        
      echo 'Error: ' . mysqli_error($conn);
      $error_message = "Invalid roll or password";
    }

    mysqli_close($conn);
  }
}

?>