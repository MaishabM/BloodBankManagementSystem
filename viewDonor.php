<?php

    include('connect.php');

    $sql = "SELECT * FROM donor";
    $result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Table</title>
    <link rel = "stylesheet" href = "admin.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<header class = "header">
        <a class = "menu-btn" href="#" id="menu_btn">☰ Menu</a>
        <h3 class = "welcome_msg"> Donor Information </h3>

        <div class = "right-btns">
            <a href = "admin.php"> Home </a>
            <a href = "search.php"> &#128269; Search </a>
            <a href = "logout.php"> Logout </a>
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
        <table>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Date Of Birth </th>
                <th> Blood Group </th>
                <th> Gender </th>
                <th> Contact NO </th>
                <th> Email </th>
                <th> Address </th>
                <th> Delete </th>
                <th> Update </th>
            </tr>

            <?php
                while($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td>
                    <?php echo "{$row['donor_id']}"; ?> 
                </td>
                <td> 
                    <?php echo "{$row['donor_name']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['donor_dob']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['donor_bloodgroup']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['donor_gender']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['donor_contact']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['donor_email']}"; ?>
                </td>
                <td>
                    <?php echo "{$row['donor_address']}"; ?>
                </td>
                <td>
                    <?php echo "<a class = 'btn btn-danger' onClick = \" javascript:return confirm('Are you sure you want to delete this record?'); \" href = 'deleteDonor.php?donor_id={$row['donor_id']}'> Delete </a>"; ?>
                </td>
                <td>
                    <?php echo "<a class = 'btn btn-primary' href = 'updateDonor.php?donor_id={$row['donor_id']}'> Update </a>"; ?>
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