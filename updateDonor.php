<?php
    error_reporting(0);

    include('connect.php');

    $donor_id = $_GET['donor_id'];
    $sql = "SELECT * FROM donor WHERE donor_id = '$donor_id' ";
    $result = mysqli_query($con, $sql);

    $row = $result->fetch_assoc();

    if(isset($_POST['update'])) {
        $id = $_POST['donor_id'];
        $name = $_POST['donor_name'];
        $contact = $_POST['donor_contact'];
        $email = $_POST['donor_email'];
        $address = $_POST['donor_address'];

        $query = "UPDATE donor SET donor_name = '$name', donor_contact = '$contact', donor_email = '$email', donor_address = '$address' WHERE donor_id = '$id' ";

        $result2 = mysqli_query($con, $query);

        if($result2) {
            // echo "New record added successfully!";

            echo "<script type = 'text/javascript'>
                    alert('Record updated successfully!')
                    window.location.href = 'viewDonor.php';
                </script>";

        }
        else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }

    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <!-- <link rel = "stylesheet" href = "addDonor.css"> -->

    <style type= "text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        body {
            background-image: url('bgForaddDonor.jpg');
            background-size: cover;       /* Cover the entire element */
            background-repeat: no-repeat; /* Don’t repeat the image */
            background-position: center;  /* Center the image */
            width: 100%;
            height: 100vh;
        }

    .form_box {
        background-color: rgba(135, 207, 235, 0.76);
        width: 400px;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <center>
    <h3>Update your information:</h3>

    <div class="form_box">
    <form action="updateDonor.php" method="post">
        <div class = "id_inp">
            <input type="hidden" name="donor_id" value="<?php echo $donor_id; ?>">
        </div>
        <div class = "name_inp">
            <label for="donor_name">Full Name:</label>
            <input type="text" name="donor_name" id="donor_name" maxlength="50" required
            value="<?php echo "{$row['donor_name']}"; ?>">
        </div>
        <div class = "contact_inp">
            <label for="donor_contact">Contact NO:</label>
            <input type="tel" name="donor_contact" id="donor_contact" maxlength="20"
            value="<?php echo "{$row['donor_contact']}"; ?>">
        </div>
        <div class = "email_inp">
            <label for="donor_email">Email:</label>
            <input type="email" name="donor_email" id="donor_email" maxlength="30"
            value="<?php echo "{$row['donor_email']}"; ?>">
        </div>
        <div class = "address_inp">
            <label for="donor_address">Address:</label>
            <textarea name="donor_address" id="donor_address" maxlength="100" rows="3"><?php echo $row['donor_address']; ?></textarea>
        </div>
        <div class = "submit_btn">
            <input class="btn btn-success"type="submit" name="update" id="update" value="Update"></input>
        </div>
</form>
</div>
</center>

    
</body>
</html>