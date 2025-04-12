<?php
error_reporting(0);

include ('connect.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        if ($row['username'] == "admin") {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Welcome Back Admin!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    setTimeout(function() {
                        window.location.href = "admin.php";
                    }, 1000);
                });
            </script>';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <!-- <div class = "error" id = "errorMessage">Invalid Input</div> -->
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" id="inputField" name="username" required placeholder="Enter your username">
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