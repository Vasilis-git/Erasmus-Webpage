<?php
    //use $_FILE for the files, store at website/uploads
    $f = $_POST['fname'];
    $l = $_POST['lname'];
    $am = $_POST['AM'];
    //$p_n = $_POST['phone-number'];
    //$em = $_POST['mail'];
    $p_p = $_POST['passed_perc'];
    $m_o = $_POST['average'];
    $e_c = $_POST['english-lang-cert'];
    $xtr_c = $_POST['other-lang-cert'];
    $f_choice = $_POST['first-choice'];
    $s_choice = $_POST['second-choice'];
    $t_choice = $_POST['third-choice'];
    $m_o_file = $_FILES['marks'];
    $e_c_file = $_FILES['english-lang-cert-paper'];
    $xtr_c_file = $_FILES['other-lang-cert'];


    $con=mysqli_connect("localhost","root","","erasmus_db");
    if(!$con){
        echo("Problem Connecting".mysqli_error($con));
    }
    mysqli_query($con,"INSERT INTO  usr_aplications(fname , lname , a_mb , pass_perc , avrg , eng_lan_certif , xtr_lang_cert , f_choice , s_choice , t_choice , marks , eng_lan_certif_file , xtr_lang_cert_file) 
    VALUES(\"$f\" , \"$l\" , \"$am\" , \"$p_p\" , \"$m_o\" , \"$e_c\" , \"$xtr_c\" ,\"$f_choice\", \"$s_choice\" , \"$t_choice\", \"$m_o_file\" , \"$e_c_file\" , \"$xtr_c_file\")");// \"$\" ,

    echo 'Η αίτηση σου στάλθηκε επιτυχώς! <a href="../index.php"> Αρχική </a>';
?>