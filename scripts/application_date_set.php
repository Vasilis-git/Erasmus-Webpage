<?php

    $start_date = $_GET["start_date"];
    $end_date = $_GET["end_date"];

    $con = mysqli_connect("localhost", "root", "", "erasmus_db");
    if (!$con) {
        echo "connection problem ".mysqli_error($con);
    } 
    else {
        mysqli_execute_query($con, "DELETE FROM applications_date");//first delete previous dates
       
        $stmnt = mysqli_prepare($con, "INSERT INTO applications_date(start_d, end_d) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmnt, "ss", $start_date, $end_date);
        mysqli_stmt_execute($stmnt);
        mysqli_stmt_close($stmnt);
        mysqli_close($con);
    }

    header("location: ../admin_settings.php");
?>