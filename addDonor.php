<?php
    error_reporting(0);

    include('connect.php');

    if(isset($_POST['submit'])) {
        $id = $_POST['donor_id'];
        $name = $_POST['donor_name'];
        $dob = $_POST['donor_dob'];
        $bloodgroup = $_POST['donor_bloodgroup'];
        $gender = $_POST['donor_gender'];
        $contact = $_POST['donor_contact'];
        $email = $_POST['donor_email'];
        $address = $_POST['donor_address'];

        $sql = "INSERT INTO donor (donor_id, donor_name, donor_dob, donor_bloodgroup, donor_gender, donor_contact, donor_email, donor_address)
        VALUES ('$id', '$name', '$dob', '$bloodgroup', '$gender', '$contact', '$email', '$address')";

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
    <title>Add Donor</title>
    <link rel = "stylesheet" href = "addDonor.css">
</head>
<body>
    <h3>Enter your information:</h3>

    <form action="addDonor.php" method="post">
        <div class = "id_inp">
            <label for="donor_id">Donor ID:</label>
            <input type="text" name="donor_id" id="donor_id" maxlength="10" required>
        </div>
        <div class = "name_inp">
            <label for="donor_name">Full Name:</label>
            <input type="text" name="donor_name" id="donor_name" maxlength="50" required>
        </div>
        <div class = "dob_inp">
            <label for="donor_dob">Date of Birth:</label>
            <input type="date" name="donor_dob" id="donor_dob" required><br>
        </div>
        <div class = "bg_inp">
            <label for="donor_bloodgroup">Blood Group:</label>
            <select name="donor_bloodgroup" id="donor_bloodgroup" required>
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
            <label for="donor_gender">Gender:</label>
            <input type="radio" name="donor_gender" value="Male" required> Male
            <input type="radio" name="donor_gender" value="Female"> Female
            <input type="radio" name="donor_gender" value="Other"> Other
        </div>
        <div class = "contact_inp">
            <label for="donor_contact">Contact Number:</label>
            <input type="tel" name="donor_contact" id="donor_contact" maxlength="20" required>
        </div>
        <div class = "email_inp">
            <label for="donor_email">Email:</label>
            <input type="email" name="donor_email" id="donor_email" maxlength="30">
        </div>
        <div class = "address_inp">
            <label for="donor_address">Address:</label>
            <textarea name="donor_address" id="donor_address" maxlength="100" rows="3"></textarea>
        </div>
        <div class = "submit_btn">
            <button type="submit" name="submit">Submit</button>
        </div>
</form>

    
</body>
</html>