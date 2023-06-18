<?php
    $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die("connection problem");
    foreach ($_GET as $uni_id => $value) {//will only have the checked checkboxes
        if(!is_int($uni_id) && !ctype_digit($uni_id)){break;}
        $stmnt = mysqli_prepare($con, "DELETE FROM universities WHERE uni_id=?");
        mysqli_stmt_bind_param($stmnt, "s", $uni_id);
        mysqli_stmt_execute($stmnt);
        mysqli_stmt_close($stmnt);
    }
    mysqli_close($con);
    header("location: ../admin_settings.php");
?>