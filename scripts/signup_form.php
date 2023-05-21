<!DOCTYPE html>

<html style="background-color: rgb(173, 173, 173);">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylefile.css"/>
    <title> Erasmus UoP</title>
</head>

<body>
    <?php
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $AM = $_POST['AM'];
        $phone_number = $_POST['phone-number'];
        $email = $_POST['mail'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = mysqli_connect("localhost", "root", "", "erasmus_db");
        $user_type = "registered";
        if (!$con) {
            echo "connection problem ".mysqli_error($con);
        } 
        else {
            //get the user type id for a registered user
            $type_id_res = mysqli_prepare($con,"SELECT user_type_id FROM user_types WHERE user_type=?");
            mysqli_stmt_bind_param($type_id_res, "s", $user_type);
            mysqli_stmt_execute($type_id_res);
            mysqli_stmt_bind_result($type_id_res, $user_type_id);
            mysqli_stmt_fetch($type_id_res);
            mysqli_stmt_close($type_id_res);
            //add the user in the database
            $stmnt = mysqli_prepare($con, "INSERT INTO users(fname, lname, a_m, tel, email, username, pass, user_type_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmnt, "sssssssi", $fname, $lname, $AM, $phone_number, $email, $username, $password, $user_type_id);
            mysqli_stmt_execute($stmnt);
            mysqli_stmt_close($stmnt);
        }
    ?>
    <button onclick="confirm();">Επιτυχής εγγραφή!</button>
    <p id="res"></p>
</body>
<script>
    function confirm(){
        var textRes = document.getElementById('res');
        textRes.innerHTML = '<?php
        header("location:../index.html");
    ?>';
    }
</script>

</html>