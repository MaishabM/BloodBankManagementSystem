<?php

    include('connect.php');

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