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

    if($_GET['donor_id']) {
        $id = $_GET['donor_id'];

        $sql = "DELETE FROM donor WHERE donor_id = '$id' ";
        $result = mysqli_query($con, $sql);
    }

    if($result) {
        echo "<script type = 'text/javascript'>
        alert('Donor record deleted successfully!')
        window.location.href = 'viewDonor.php';
    </script>";

    }


?>