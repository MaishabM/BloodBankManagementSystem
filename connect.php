<?php
$server   = "localhost";
$username = "root";
$password = "root";
$database = "bloodbank";

// Connect to the database
$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>