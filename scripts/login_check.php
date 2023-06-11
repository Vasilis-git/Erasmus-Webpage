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

        $con = mysqli_connect("localhost", "root", "", "erasmus_db.sql");
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
                $_SESSION['user_type'] = $user_type;
                $_SESSION['password'] = $pass;
                
                $stmnt = mysqli_prepare($con, "SELECT fname, lname, a_m, tel, email FROM users WHERE username = ?");
                mysqli_stmt_bind_param($stmnt, "s", $username);
                mysqli_stmt_execute($stmnt);
                mysqli_stmt_bind_result($stmnt, $fname, $lname, $AM, $phone_number, $email);
                mysqli_stmt_fetch($stmnt);
                mysqli_stmt_close($stmnt);

                //check if user is admin
                if($AM == '2022999999999'){
                    $user_type = "admin";
                } 


                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $user_type;
                $_SESSION['password'] = $pass;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['a_m'] = $AM;
                $_SESSION['tel'] = $phone_number;
                $_SESSION['email'] = $email;
            }
            else{
                echo "<p>Τα στοιχεία που έδωσες δεν ήταν σωστά. <a href=\"../login.php\">Προσπάθησε ξανά</a></p>";
            }
            mysqli_close($con);
        }
    ?>
</body>
</html>