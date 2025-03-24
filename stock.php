<?php

    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "bloodbank";

    $con = mysqli_connect($server, $username, $password, $database);
    mysqli_select_db($con, "bloodbank") or die("Database selection failed: " . mysqli_error($con));


    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
}

    $sql = "SELECT * FROM stock ORDER BY blood_group";
    $result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Table</title>
    <link rel = "stylesheet" href = "admin.css">
</head>
<body>
<header class = "header">
        <a href="#" id="menu_btn">☰ Menu</a>
        <h3 class = "welcome_msg"> Inventory </h3>

        <div class = "right-btns">
            <a href = "admin.php"> Home </a>
            <a href = "search.php"> &#128269; Search </a>
            <a class = "logout-btn" href = "logout.php"> Logout </a>
        </div>
    </header>

    <aside id = "sidebar">
        <ul>
            <li>
                <a href = "addDonor.php"> Add Donor </a>
            </li>

            <li>
                <a href = "viewDonor.php"> View Donors </a>
            </li>

            <li>
                <a href = "donateBlood.php"> Donate Blood </a>
            </li>

            <li>
                <a href = "addPatient.php"> Add Patient </a>
            </li>

            <li>
                <a href = "viewPatient.php"> View Patients </a>
            </li>

            <li>
                <a href = "issueBlood.php"> Issue Blood </a>
            </li>

            <li>
                <a href = "stock.php"> Inventory </a>
            </li>
        </ul>
    </aside>

    <script src="script.js"></script>


<div class = "data_sheet">
    <center>
        <!-- <h1"> Donor Information </h1> -->

        <table border = "2px">
            <tr>
                <th> ID </th>
                <th> Blood Group </th>
                <th> Total Quantity (in units) </th>
            </tr>

            <?php
                while($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td>
                    <?php echo "{$row['stock_id']}"; ?> 
                </td>
                <td> 
                    <?php echo "{$row['blood_group']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['total_quantity']}"; ?>
                </td>
            </tr>

            <?php
                }
            ?>
        </table>
    </center>
</div>
    
</body>
</html>