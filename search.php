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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" href = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>

    <div class = "container" padding-top = "50px">
        <form method = "POST" class="d-flex align-items-center">
            <label for="table_name" class="me-3 fs-4">Table:</label>
            <select name="table_name" id="table_name" class="form-control form-control-lg w-auto me-4 fs-4" required>
                    <option value="">SELECT</option>
                    <option name = "donor" value="donor">Donor</option>
                    <option name = "patient" value="patient">Patient</option>
            </select>
            <input type = "text" name = "search" placeholder = "Search Data" class="form-control form-control-lg w-50 me-3 fs-4">
            <button class = "btn btn-dark btn lg fs-4 px-4" type = "submit" name = "submit">Search</button>
        </form>

        <div class = "container" padding-top = "50px">
            <table class="table table-bordered table-striped mt-4" style="font-size: 1.2rem;">
            <?php
                if (isset($_POST['submit'])) {
                    $search = mysqli_real_escape_string($con, $_POST['search']);
                    $table = mysqli_real_escape_string($con, $_POST['table_name']);
                    if ($table == "donor") {
                        $sql = "SELECT * FROM donor WHERE 
                                donor_id LIKE '%$search%' OR 
                                donor_name LIKE '%$search%' OR 
                                donor_dob LIKE '%$search%' OR 
                                donor_bloodgroup LIKE '%$search%' OR 
                                donor_gender LIKE '%$search%' OR 
                                donor_contact LIKE '%$search%' OR 
                                donor_email LIKE '%$search%' OR 
                                donor_address LIKE '%$search%'";
                    }
                    else if ($table == "patient") {
                        $sql = "SELECT * FROM patient WHERE 
                                patient_id LIKE '%$search%' OR 
                                patient_name LIKE '%$search%' OR 
                                patient_dob LIKE '%$search%' OR 
                                patient_bloodgroup LIKE '%$search%' OR 
                                patient_gender LIKE '%$search%' OR 
                                patient_contact LIKE '%$search%' OR 
                                patient_email LIKE '%$search%' OR 
                                patient_address LIKE '%$search%' OR
                                patient_status LIKE '%$search%' OR
                                patient_quantity LIKE '%$search%'";
                    }
                    else {
                        echo "<h3>Please select a table.</h3>";
                    }

                    $result = mysqli_query($con, $sql); // Fixed connection variable

                    if ($table == "patient") {

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<thead>
                                        <tr>
                                            <th>Patient ID</th>
                                            <th>Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Blood Group</th>
                                            <th>Contact NO</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['patient_id']}</td>
                                            <td>{$row['patient_name']}</td>
                                            <td>{$row['patient_dob']}</td>
                                            <td>{$row['patient_bloodgroup']}</td>
                                            <td>{$row['patient_contact']}</td>
                                            <td>{$row['patient_email']}</td>
                                            <td>{$row['patient_status']}</td>
                                            <td>{$row['patient_quantity']}</td>
                                        </tr>";
                                }

                                echo "</tbody>";
                            } 
                            else {
                                echo "<h3>No records found</h3>";
                            }
                        } 
                        else {
                            echo "Error: " . mysqli_error($con);
                        }
                    }
                    else {

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<thead>
                                        <tr>
                                            <th>Donor ID</th>
                                            <th>Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Blood Group</th>
                                            <th>Contact NO</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['donor_id']}</td>
                                            <td>{$row['donor_name']}</td>
                                            <td>{$row['donor_dob']}</td>
                                            <td>{$row['donor_bloodgroup']}</td>
                                            <td>{$row['donor_contact']}</td>
                                            <td>{$row['donor_email']}</td>
                                        </tr>";
                                }

                                echo "</tbody>";
                            } 
                            else {
                                echo "<h3>No records found</h3>";
                            }
                        } 
                        else {
                            echo "Error: " . mysqli_error($con);
                        }
                    }
                }
            ?>
            </table>
        </div>>
        

        </div>
    </div>

</body>
</html>