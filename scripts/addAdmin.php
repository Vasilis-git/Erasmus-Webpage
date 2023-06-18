<?php
    $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die('connection problem');
    //check username
    $stmnt = mysqli_prepare($con, "SELECT COUNT(*) FROM users WHERE user_type_id=3 AND username=?");
    mysqli_stmt_bind_param($stmnt, "s", $_POST["username"]);
    mysqli_stmt_execute($stmnt);
    mysqli_stmt_bind_result($stmnt, $count);
    mysqli_stmt_fetch($stmnt);
    mysqli_stmt_close($stmnt);
    if($count == 0){
        $stmnt = mysqli_prepare($con, "INSERT INTO users(fname, lname, a_m, tel, email, username, pass, user_type_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $user_type_id = 3;
        mysqli_stmt_bind_param($stmnt,  "sssssssi", $_POST["fname"], $_POST["lname"], $_POST["a_m"], $_POST["phone-number"], $_POST["mail"], $_POST["username"], $_POST["password"], $user_type_id);
        mysqli_stmt_execute($stmnt);
        mysqli_stmt_close($stmnt);
        header("location: ../admin_settings.php");
    }else{
        echo 'Το όνομα χρήστη υπάρχει ήδη. <a href="../admin_settings.php">Πίσω</a>';
    }
    mysqli_close($con);
?>