<?php
    error_reporting(0);

    include('connect.php');

    if(isset($_POST['submit'])) {
        $id = $_POST['patient_id'];
        $name = $_POST['patient_name'];
        $dob = $_POST['patient_dob'];
        $bloodgroup = $_POST['patient_bloodgroup'];
        $gender = $_POST['patient_gender'];
        $contact = $_POST['patient_contact'];
        $email = $_POST['patient_email'];
        $address = $_POST['patient_address'];
        $status = $_POST['patient_status'];
        $quantity = $_POST['patient_quantity'];

        $sql = "INSERT INTO patient (patient_id, patient_name, patient_dob, patient_bloodgroup, patient_gender, patient_contact, patient_email, patient_address, patient_status, patient_quantity)
        VALUES ('$id', '$name', '$dob', '$bloodgroup', '$gender', '$contact', '$email', '$address', '$status', '$quantity')";

        if(mysqli_query($con, $sql)) {
            // echo "New record added successfully!";

            echo "<script type = 'text/javascript'>
                    alert('New record added successfully!')
                    window.location.href = 'admin.php';
                </script>";
            // header ("Location: admin.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel = "stylesheet" href = "addDonor.css">
</head>
<body>
    <div class = "container">
    <h3>Enter your information:</h3>

    <form action="addPatient.php" method="post">
        <div class = "id_inp">
            <label for="patient_id">Patient ID:</label>
            <input type="text" name="patient_id" id="patient_id" maxlength="10" required>
        </div>
        <div class = "name_inp">
            <label for="patient_name">Full Name:</label>
            <input type="text" name="patient_name" id="patient_name" maxlength="50" required>
        </div>
        <div class = "dob_inp">
            <label for="patient_dob">Date of Birth:</label>
            <input type="date" name="patient_dob" id="patient_dob" required><br>
        </div>
        <div class = "bg_inp">
            <label for="patient_bloodgroup">Blood Group:</label>
            <select name="patient_bloodgroup" id="patient_bloodgroup" required>
                    <option value="">Select</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
            </select>
        </div>
        <div class = "gender_inp">
            <label for="patient_gender">Gender:</label>
            <input type="radio" name="patient_gender" value="Male" required> Male
            <input type="radio" name="patient_gender" value="Female"> Female
            <input type="radio" name="patient_gender" value="Other"> Other
        </div>
        <div class = "contact_inp">
            <label for="patient_contact">Contact NO:</label>
            <input type="tel" name="patient_contact" id="patient_contact" maxlength="20" required>
        </div>
        <div class = "email_inp">
            <label for="patient_email">Email:</label>
            <input type="email" name="patient_email" id="patient_email" maxlength="30">
        </div>
        <div class = "address_inp">
            <label for="patient_address">Address:</label>
            <textarea name="patient_address" id="patient_address" maxlength="100" rows="3"></textarea>
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
            <button type="submit" name="submit">Submit</button>
        </div>
</form>
</div>

    
</body>
</html>