<?php
    $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die('connection problem');
    mysqli_query($con, "UPDATE applications_date SET announce=true");
    mysqli_close($con);

    header("location: ../admin_settings.php");
?>