<?php
    $uni_name = $_GET['uni_name'];
    $country = $_GET['country'];
    
    $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die('connection problem');
    $stmnt = mysqli_prepare($con, "SELECT COUNT(*) FROM universities WHERE uni_name=? AND country=?");
    mysqli_stmt_bind_param($stmnt, "ss", $uni_name, $country);
    mysqli_stmt_execute($stmnt);
    mysqli_stmt_bind_result($stmnt, $count);
    mysqli_stmt_fetch($stmnt);
    mysqli_stmt_close($stmnt);

    if($count == 0){
        $stmnt = mysqli_prepare($con, "INSERT INTO universities(uni_name, country) VALUES (?,?)");
        mysqli_stmt_bind_param($stmnt, "ss", $uni_name, $country);
        mysqli_stmt_execute($stmnt);
        mysqli_stmt_close($stmnt);
        mysqli_close($con);
    }
    
    header("location: ../admin_settings.php");
?>