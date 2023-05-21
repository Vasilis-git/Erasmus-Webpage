<?php
    $username = $_POST['username'];

    $con = mysqli_connect("localhost", "root", "", "erasmus_db");
    if (!$con) {
        echo "connection problem ".mysqli_error($con);
    } else {
        //code to avoid SQL injection attacks
        $stmnt = mysqli_prepare($con, "SELECT COUNT(*) FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmnt, "s", $username);
        mysqli_stmt_execute($stmnt);
        mysqli_stmt_bind_result($stmnt, $count);
        mysqli_stmt_fetch($stmnt);
        mysqli_stmt_close($stmnt);
        mysqli_close($con);

        if($count != 0){
            echo"username exists";
        }
        else{
            echo "username doesn't exist, you can sign up";
        }

    } 
?>