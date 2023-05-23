<?php
    session_start();

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
       // Prepare the SQL statement
        $statement = mysqli_prepare($con, "UPDATE users SET fname=?, lname=?, a_m=?, tel=?, email=?, pass=? WHERE username=?");

        // Bind the parameters to the statement
        mysqli_stmt_bind_param($statement, "sssssss", $fname, $lname, $AM, $phone_number, $email, $password, $username);

        // Execute the statement
        mysqli_stmt_execute($statement);

        // Check if the update was successful
        if (mysqli_stmt_affected_rows($statement) > 0) {
            echo "Επιτυχής ενημέρωση των στοιχείων! <a href=\"../index.php\">Πίσω στην αρχική</a>";
        } else {
            echo "Κάτι πήγε στραβά και οι αλλαγές δεν αποθηκεύτηκαν... <a href=\"../usr_prof.php\">Προσπάθεια ξανά</a>";
        }

        mysqli_stmt_close($statement);  

        $_SESSION['username'] = $username;
        $_SESSION['pass'] = $password;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['a_m'] = $AM;
        $_SESSION['tel'] = $phone_number;
        $_SESSION['email'] = $email;
    }
    mysqli_close($con);
?>