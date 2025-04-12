<?php
    error_reporting(0);

    include('connect.php');

    if(isset($_POST['submit'])) {
        $issue_id = $_POST['issue_id'];
        $id = $_POST['patient_id'];
        $quantity = $_POST['quantity'];

        $check = "SELECT patient_id FROM patient WHERE patient_id = '$id'";
        $result = mysqli_query($con, $check);

        if(mysqli_num_rows($result) > 0) {

            $sql = "INSERT INTO issue (issue_id, patient_id, quantity, issue_date)
            VALUES ('$issue_id', '$id', '$quantity', NOW())";

            if(mysqli_query($con, $sql)) {
                echo "<script type = 'text/javascript'>
                        alert('Blood issued successfully!')
                        window.location.href = 'admin.php';
                    </script>";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
        else {
            echo "<script type = 'text/javascript'>
                        alert('Error: Patient ID does not exist!')
                        window.location.href = 'issueBlood.php';
                    </script>";
        }
        

    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Issuance</title>
    <link rel = "stylesheet" href = "addDonor.css">
</head>
<body>
    <h3>Issue Blood:</h3>

    <form action="issueBlood.php" method="post">
    <div class="issueID_inp">
        <label for="issue_id">Issue ID:</label>
        <input type="text" name="issue_id" id="issue_id" maxlength="10" required>
    </div>
    <div class="patientID_inp">
        <label for="patient_id">Patient ID:</label>
        <input type="text" name="patient_id" id="patient_id" maxlength="10" required>
    </div>
    <div class="quantity_inp">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="999" required>
    </div>
    <div class="date_inp">
        <label for="issue_date">Issue Date:</label>
        <input type="datetime-local" id="issue_date" name="issue_date" required>
    </div>
    <div class="submit_btn">
        <button type="submit" name="submit">Submit</button>
    </div>
</form>


    
</body>
</html>