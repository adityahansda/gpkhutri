<?php

$server = "localhost";
$usernames = "root";
$password = "";
$database = "urs";

$conn = mysqli_connect($server, $usernames, $password, $database);

if ($conn){
    echo "Connection";

}
    else {
        die ("Error". mysqli_connect_error());
    }

?>