<?php

    include('connect.php');

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