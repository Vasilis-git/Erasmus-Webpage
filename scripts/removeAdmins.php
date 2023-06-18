<?php
   $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die("connection problem");
   foreach($_POST as $user_id => $checked){
        if (!is_int($user_id) && !ctype_digit($user_id)) {break;}
        $stmnt = mysqli_prepare($con, "DELETE FROM users WHERE user_id=?");
        mysqli_stmt_bind_param($stmnt, "s", $user_id);
        mysqli_stmt_execute($stmnt);
        mysqli_stmt_close($stmnt);
    }   
    mysqli_close($con);
    header("location: ../admin_settings.php");
?>