<?php
    error_reporting(0);

    include('connect.php');

    if(isset($_POST['submit'])) {
        $blood_no = $_POST['blood_no'];
        $id = $_POST['donor_id'];
        $quantity = $_POST['quantity'];

        $check = "SELECT donor_id FROM donor WHERE donor_id = '$id'";
        $result = mysqli_query($con, $check);

        if(mysqli_num_rows($result) > 0) {

            $sql = "INSERT INTO blood (blood_no, donor_id, quantity)
            VALUES ('$blood_no', '$id', '$quantity')";

            if(mysqli_query($con, $sql)) {
                echo "<script type = 'text/javascript'>
                        alert('Blood donated successfully!')
                        window.location.href = 'admin.php';
                    </script>";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
        else {
            echo "<script type = 'text/javascript'>
                        alert('Error: Donor ID does not exist!')
                        window.location.href = 'donateBlood.php';
                    </script>";
        }
        

    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation</title>
    <link rel = "stylesheet" href = "addDonor.css">
</head>
<body>
    <h3>Donate Blood:</h3>

    <form action="donateBlood.php" method="post">
        <div class = "bloodNo_inp">
            <label for="blood_no">Blood NO:</label>
            <input type="text" name="blood_no" id="blood_no" maxlength="10" required>
        </div>
        <div class = "id_inp">
            <label for="donor_id">Donor ID:</label>
            <input type="text" name="donor_id" id="donor_id" maxlength="10" required>
        </div>
        <div class = "quantity_inp">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="999" required>
        </div>
        <div class = "submit_btn">
            <button type="submit" name="submit">Submit</button>
        </div>
</form>

    
</body>
</html>