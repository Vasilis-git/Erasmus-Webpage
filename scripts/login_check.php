<!DOCTYPE html>

<?php 
    session_start();
?>

<html style="background-color: rgb(173, 173, 173);">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylefile.css"/>
    <title> Erasmus UoP</title>
</head>

<body>
    <?php
        $username = $_POST["username"];
        $pass = $_POST["password"];

        $con = mysqli_connect("localhost", "root", "", "erasmus_db");
        $user_type = "registered";
        if (!$con) {
            echo "connection problem ".mysqli_error($con);
        } 
        else {
            $stmnt = mysqli_prepare($con, "SELECT COUNT(*) FROM users WHERE (username, pass) = (?,?)");
            mysqli_stmt_bind_param($stmnt, "ss", $username, $pass);
            mysqli_stmt_execute($stmnt);
            mysqli_stmt_bind_result($stmnt, $count);
            mysqli_stmt_fetch($stmnt);
            mysqli_stmt_close($stmnt);

            if($count == 1){
                echo "<p>Επιτυχής σύνδεση! <a href=\"../index.php\">Πίσω στην αρχική</a></p>";
                $_SESSION['username'] = $username;
                $_SESSION['user-type'] = $user_type;
                //fill the below with sql query
                $_SESSION['pass'] = '';
                $_SESSION['fname'] = '';
                $_SESSION['lname'] = '';
                $_SESSION['a_m'] = '';
                $_SESSION['tel'] = '';
            }
            else{
                echo "<p>Τα στοιχεία που έδωσες δεν ήταν σωστά. <a href=\"../login.php\">Προσπάθησε ξανά</a></p>";
            }
        }
    ?>
</body>
</html>