<?php
    $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die("connection problem");
    foreach ($_GET as $user_id => $value) {//will only have the checked checkboxes
        $usr_a_m = mysqli_fetch_assoc(mysqli_query($con, "SELECT a_m FROM users WHERE user_id=".$user_id));
        mysqli_query($con, "UPDATE usr_aplications SET approved = 1 WHERE usr_aplications.a_m =".$usr_a_m["a_m"]);
    }
    mysqli_close($con);
    header("location: ../admin_settings.php");
?>