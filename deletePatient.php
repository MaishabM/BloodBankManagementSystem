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

    if($_GET['patient_id']) {
        $id = $_GET['patient_id'];

        $sql = "DELETE FROM patient WHERE patient_id = '$id' ";
        $result = mysqli_query($con, $sql);
    }

    if($result) {
        echo "<script type = 'text/javascript'>
        alert('Patient record deleted successfully!')
        window.location.href = 'viewPatient.php';
    </script>";

    }


?>