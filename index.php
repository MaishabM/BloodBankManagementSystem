<?php
error_reporting(0);
$server   = "localhost";
$username = "root";
$password = "root";
$database = "bloodbank";

// Connect to the database
$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        if ($row['username'] == "admin") {
            header("Location: admin.php");
            exit();
        } 
        elseif ($row['username'] == "donor") {
            header("Location: donor.php");
            exit();
        } 
        elseif ($row['username'] == "patient") {
            header("Location: patient.php");
            exit();
        }
    }
    else {
        $error_message = "Invalid Username or Password!";
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blood Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <label class="header">BLOOD BANK MANAGEMENT SYSTEM</label>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </nav>

        <div class="login-box">
            <h2>Login</h2>
            <?php if (isset($error_message)) { echo "<p class='error'>$error_message</p>"; } ?>
            <form action="index.php" method="post">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Enter your username">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>