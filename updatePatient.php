<?php
    error_reporting(0);

    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "bloodbank";

    $con = mysqli_connect($host, $username, $password, $database);

    if($con === false) {
        die("Connection error: ". mysqli_connect_error());
    }

    $patient_id = $_GET['patient_id'];
    $sql = "SELECT * FROM patient WHERE patient_id = '$patient_id' ";
    $result = mysqli_query($con, $sql);

    $row = $result->fetch_assoc();

    if(isset($_POST['update'])) {
        $id = $_POST['patient_id'];
        $name = $_POST['patient_name'];
        $contact = $_POST['patient_contact'];
        $email = $_POST['patient_email'];
        $address = $_POST['patient_address'];
        $status = $_POST['patient_status'];
        $quantity = $_POST['patient_quantity'];

        $query = "UPDATE patient SET patient_name = '$name', patient_contact = '$contact', patient_email = '$email', patient_address = '$address', patient_status = '$status', patient_quantity = '$quantity' WHERE patient_id = '$id' ";

        $result2 = mysqli_query($con, $query);

        if($result2) {
            // echo "New record added successfully!";

            echo "<script type = 'text/javascript'>
                    alert('Record updated successfully!')
                    window.location.href = 'viewPatient.php';
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
    <form action="updatePatient.php" method="post">
        <div class = "id_inp">
            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
        </div>
        <div class = "name_inp">
            <label for="patient_name">Full Name:</label>
            <input type="text" name="patient_name" id="patient_name" maxlength="50" required
            value="<?php echo "{$row['patient_name']}"; ?>">
        </div>
        <div class = "contact_inp">
            <label for="patient_contact">Contact NO:</label>
            <input type="tel" name="patient_contact" id="patient_contact" maxlength="20"
            value="<?php echo "{$row['patient_contact']}"; ?>">
        </div>
        <div class = "email_inp">
            <label for="patient_email">Email:</label>
            <input type="email" name="patient_email" id="patient_email" maxlength="30"
            value="<?php echo "{$row['patient_email']}"; ?>">
        </div>
        <div class = "address_inp">
            <label for="patient_address">Address:</label>
            <textarea name="patient_address" id="patient_address" maxlength="100" rows="3"><?php echo $row['patient_address']; ?></textarea>
        </div>
        <div class = "status_inp">
            <label for="patient_status">Status:</label>
            <input type="radio" name="patient_status" value="Pending" required> Pending
            <input type="radio" name="patient_status" value="Completed"> Completed
        </div>
        <div class = "quantity_inp">
            <label for="patient_quantity">Quantity:</label>
            <input type="number" id="patient_quantity" name="patient_quantity" min="1" max="999" required>
        </div>
        <div class = "submit_btn">
            <input class="btn btn-success"type="submit" name="update" id="update" value="Update"></input>
        </div>
</form>
</div>
</center>

    
</body>
</html>