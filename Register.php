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
            <p class="text-mute">STUDENT SIGN UP FORM</p>
            <h1 class="heading-primary">Create new account<span class="custom-dot">.</span></h1>
            <p class="text-mute">Already A Member? <a href="sign in.php">Log in</a></p>
            <p class="text-mute">Back To Home  <a href="index.html">Home</a></p>
            <p class="text-mute">view Database <a href="Display.php">View</a></p>
            <!------------------------------------------------------------->
            <form class="signup-form" method="POST">
                <div class="f-row input-wrapper">
                    <label class="inp">
                        <input maxlength="15"  type="text" name="firstName" class="input-text" placeholder="&nbsp;">
                        <span class="label">First name</span>
                        <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
                    </label>
                    <label class="inp">
                        <input maxlength="15" type="text" name="lastName" class="input-text" placeholder="&nbsp;">
                        <span class="label">Last name</span>
                        <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
                    </label>
                </div>
                <label class="inp">
                    <input maxlength="20" type="text" name="branch" class="input-text" placeholder="&nbsp;">
                    <span class="label">Branch</span>
                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </label>
                <label class="inp">
                    <input maxlength="11"  type="text" name="roll" class="input-text" placeholder="&nbsp;">
                    <span   class="label">Roll</span>
                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </label>
                <label class="inp">
                    <input    type="email" name="email" class="input-text" placeholder="&nbsp;">
                    <span class="label">Email</span>
                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                </label>
                <label class="inp">
                    <input type="date" name="dob" class="input-text" placeholder="&nbsp;">
                    <span class="label">D.O.B</span>
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

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include 'dbconnect.php';
    $f_name = $_POST['firstName'];
    $l_name = $_POST['lastName'];
    $roll = $_POST['roll'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `usrdt` (`first_name`, `last_name`, `roll`, `branch`, `email`, `dob`, `password`) VALUES ('$f_name', '$l_name', '$roll', '$branch', '$email', '$dob', '$password')";

  
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo 'Update!';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}


?>


