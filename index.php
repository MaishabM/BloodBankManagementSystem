<?php
error_reporting(0);
if(isset($_POST["username"])) {
    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "bloodbank";

    $con = mysqli_connect($server, $username, $password, $database);
    mysqli_select_db($con, "bloodbank") or die("Database selection failed: " . mysqli_error($con));


    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // print_r($_POST);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
           $username = $_POST['username'];
           $password = $_POST['password'];
        //    $insert = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password');";

           $sql = "SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '".$password."' ";

              $result = mysqli_query($con,$sql);

              $row = mysqli_fetch_array($result);

              if($row['username'] == "admin"){
                //   echo "Login Successful";
                  header("Location: admin.php");
              } 
              elseif($row["username"] == "donor"){ 
                //   echo "Login Successful";
                  header("Location: donor.php");
              }
              elseif($row["username"] == "patient"){
                //   echo "Login Successful";
                  header("Location: patient.php"); 
              }
              else {
                  echo "Login Failed";
              }
        }
    if($con->query($sql) != true){
    echo "ERROR: " . $con->error; // Only show errors
}
        
    }

$con->close();
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img  class="blood" src="blood.jpg" alt="Error loading image...)">
    <nav>
        <label class = "header"> BLOOD BANK MANAGEMENT SYSTEM </label>

        <ul>
            <li><a href=""> Home </a></li>
            <li><a href=""> Contact Us </a></li>
            <li><a href=""> About Us </a></li>
            <!-- <li><a href=""> Home </a></li> -->
        </ul>
    </nav>
    <div class = "container">
        <h2>BLOOD BANK MANAGEMENT SYSTEM</h2>
        <!-- <p>Enter your login information: </p> -->

        <form action="index.php" method="post">
            <div class="username_inp"> 
                  <label class = "user_label"> Username: </label>
                  <input type="text" name="username" id="username" placeholder="Enter your username">
            </div>
            <div class="password_inp"> 
                  <label class = "pass_label"> Password: </label>
                  <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            <button class = "submit">Login</button>
        </form>
    </div>
    <!-- <script src= "index.js"></script> -->
    <!-- INSERT INTO `user` (`username`, `password`) VALUES ('admin', '1234'); -->
</body>
</html>