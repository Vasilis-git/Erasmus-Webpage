<?php
    //use $_FILE for the files, store at website/uploads
    $f = $_POST['fname'];
    $l = $_POST['lname'];
    $am = $_POST['AM'];
    $p_p = $_POST['passed_perc'];
    $m_o = $_POST['average'];
    $e_c = $_POST['english-lang-cert'];
    $xtr_c = $_POST['extra-lang-cert'];
    $f_choice = $_POST['first-choice'];
    $s_choice = $_POST['second-choice'];
    $t_choice = $_POST['third-choice'];
    $m_o_file = $_FILES['marks']["name"];
    $e_c_file = $_FILES['english-lang-cert-paper']["name"];
    $xtr_c_files = $_FILES['other-lang-cert']["name"];

    //store in server
    $destination = "C:\\xampp\\htdocs\\webpage\\uploads\\".$am."\\";
    if (!file_exists($destination)) {
        mkdir($destination, 0700, true);
    }
    if(!empty($_FILES)){
        $destination .= $_FILES['english-lang-cert-paper']["name"];
        $filename = $_FILES['english-lang-cert-paper']["tmp_name"];
        move_uploaded_file($filename, $destination);

        $destination = "C:\\xampp\\htdocs\\webpage\\uploads\\".$am."\\";
        $destination .= $_FILES['marks']["name"];
        $filename = $_FILES['marks']["tmp_name"];
        move_uploaded_file($filename, $destination);

        $destination = "C:\\xampp\\htdocs\\webpage\\uploads\\".$am."\\";
        $files = $_FILES['other-lang-cert'];
        $tmp_filename = [];
        foreach($files['tmp_name'] as $index => $tmp_name){
           $tmp_filename[] = $tmp_name;
        }
        $true_filename = [];
        foreach($files['name'] as $index => $name){
            $true_filename[] = $name;
        }
        $i = 0;
        foreach($tmp_filename as $tmp_name){
            $destination .= $true_filename[$i];
            $filename = $tmp_name;
            move_uploaded_file($filename, $destination);
            $destination = "C:\\xampp\\htdocs\\webpage\\uploads\\".$am."\\";
            $i += 1;
        }
    }
    $store_format = "";
    foreach($xtr_c_files as $filename){
        $store_format .= $filename.",";
    }
    $store_format = substr($store_format, 0, strlen($store_format)-1);//remove last ','

    $con=mysqli_connect("localhost","root","","erasmus_db");
    if(!$con){
        echo("Problem Connecting".mysqli_error($con));
    }
    mysqli_query($con,"INSERT INTO  usr_aplications(fname , lname , a_m , pass_perc , avrg , eng_lan_certif , xtr_lang_cert , f_choice , s_choice , t_choice , marks , eng_lan_certif_file , xtr_lang_cert_file) 
    VALUES(\"$f\" , \"$l\" , \"$am\" , \"$p_p\" , \"$m_o\" , \"$e_c\" , \"$xtr_c\" ,\"$f_choice\", \"$s_choice\" , \"$t_choice\", \"$m_o_file\" , \"$e_c_file\" , \"$store_format\")");// \"$\" ,

    echo 'Η αίτηση σου στάλθηκε επιτυχώς! <a href="../index.php"> Αρχική </a>';
?>