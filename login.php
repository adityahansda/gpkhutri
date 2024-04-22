
<?php
$alert ="";
// Check if the button is clicked
if (isset($_POST['submit'])) {

session_start();


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

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idStudent = $_POST["roll"];
    $password = $_POST["password"];

    // Prepare a statement
    $stmt = $conn->prepare("SELECT * FROM student WHERE idStudent=? AND password=?");
    $stmt->bind_param("ss", $idStudent, $password);

    // Set parameters and execute
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Credentials are correct, start session and redirect
        $_SESSION["roll"] = $roll;
        header("Location: dashboard.php"); // Redirect to dashboard page
        exit();
    } else {
        $alert = "Invalid username or password";
    }
}

// Close connection
$conn->close();


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
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <div class="container">
        <div class="pic2"></div>
        <img   style=" background-color: #1B2133; width: 80px; height: 90px;   "  src="https://adityahansda.github.io/gpkhutri/image/gp-khutri-logo-Main.png" alt="">
        <h1>Student Register</h1>
        <form  method="post">
            <span style =" color:yellow;">   <?php echo $alert ?> </span>
            <div class="inp">
            <input type="text" id="roll" name="roll"  placeholder="Enter Roll Number" required >
            </div>
            <div class="inp">
            <input type="password" id="password" name="password"  placeholder="Password" required>
            </div>
            <button  name="submit" type="submit">Login In</button>
            <br>
            <br>           
        </form>
        <button class="button"  onclick="location.href = 'index.php';"  name="submit" type="submit">Sign up</button>
    </div>
    <div class="pic">
    </div>
</body>


