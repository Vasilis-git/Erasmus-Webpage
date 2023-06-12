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
        <style>
            p{
                margin-bottom: 0;
                margin-top: 3vw;
            }
            input[type="button"]{
                float:none;
            }
            @media screen and (min-width: 760px) {/*for desktop*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(8, 1fr);
                        grid-auto-rows: minmax(1vw, auto);  
                        grid-template-areas: 
                        "h  h  h  h  h  h  h  hi"
                        "ht ht ht ht ht ht ht hi"
                        "m  m  m  m  m  m  m  m"
                        ".  .  f  f  f  f  .  ."
                        "fi fi fi fi fi fi fi fi"
                        ;
                }
            }
            @media screen and (max-width: 759px) {/*for tablets and phones*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(1, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        
                        grid-template-areas: 
                        "h"
                        "ht"
                        "m"
                        "f"
                        ;
                }
                .heading{
                    border-top-right-radius: 1vw;
                }
                .heading-title{
                    border-bottom-right-radius: 1vw;
                }
                .footer-image{
                    display:none;
                }
                .heading-image{
                    display:none;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="heading">
                <h1>Πρόγραμμα Erasmus Πανεπιστήμιο Πελλοπονήσου</h1>       
            </div>
            <div class="heading-image">
                <img src="media/images/uoplogo.png" alt="University of the Pelloponese Logo">
            </div>   
            <div class="heading-title">
                <h1>Αίτηση</h1>
            </div>

            <div class="menu">
                <a href="index.php">Αρχική</a>
                <a href="login.php">Σύνδεση χρήστη</a>
                <a href="more.php">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
            </div>
            <form id="ApplicationForm" method="POST" action="scripts/application_form.php" onsubmit="return checkNec();">
                <div class="form-credentials">
                    <input type="text" name="fname" placeholder="Όνομα" readonly value="<?php echo $_SESSION['fname']; ?>"> <br>
                    <input type="text" name="lname" placeholder="Επίθετο" readonly value="<?php echo $_SESSION['lname']; ?>"> <br>
                    <input type="number" name="AM" placeholder="AM" readonly value="<?php echo $_SESSION['a_m']; ?>"> <br>
                    <br>
                    Ποσοστό περασμένων μαθημάτων έως και το προηγούμενο έτος:&nbsp;
                    <input type="number" name="passed_perc" id="passed_perc" min="0" max="100" value="50" style="margin-top: 0vw;"><br>
                    <br>
                    Μέσος όρος των περασμένων μαθημάτων έως και το προηγούμενο έτος:&nbsp;
                    <input type="number" name="average" id ="average" min="0" max="10" value="5" step="0.01" style="margin-top: 0vw;"><br><br>
                    Πιστοποιητικό γνώσης της αγγλικής γλώσσας:<br>
                    <input type="radio" name="english-lang-cert" id="A1" value="A1" checked>A1
                    <input type="radio" name="english-lang-cert" id="A2" value="A2">A2
                    <input type="radio" name="english-lang-cert" id="B1" value="B1">B1
                    <input type="radio" name="english-lang-cert" id="B2" value="B2">B2
                    <input type="radio" name="english-lang-cert" id="C1" value="C1">C1
                    <input type="radio" name="english-lang-cert" id="C2" value="C2">C2 <br>
                    <br>Γνώση επιπλέον ξένων γλωσσών:<br>
                    <input type="radio" name="extra-lang-cert" id="yes" value="yes">ΝΑΙ
                    <input type="radio" name="extra-lang-cert" id="no" value="no" checked>ΟΧΙ<br>
                    <br>
                    <div style="margin-bottom: 0.1vw;">
                        <br> Πανεπιστήμιο - 1η επιλογή:&nbsp;
                        <select name="first-choice">
                            <?php
                                $con = mysqli_connect("localhost", "root", "", "erasmus_db.sql");
                                if (!$con) {
                                    echo "<option value='problem in the connection " . mysqli_error($con) . "'>connection problem</option>";
                                } else {
                                    $result = mysqli_query($con, "SELECT uni_name FROM Universities");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $uni_name = $row['uni_name'];
                                        echo "<option value=\"$uni_name\">$uni_name</option>";
                                    }
                                    mysqli_close($con);
                                }   
                            ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 0.1vw;"></div>
                        <br> Πανεπιστήμιο - 2η επιλογή:&nbsp;
                        <select name="second-choice" style="margin-bottom: 0.2vw;">
                            <option value="">-</option>
                            <?php
                                $con = mysqli_connect("localhost", "root", "", "erasmus_db.sql");
                                if (!$con) {
                                    echo "<option value='problem in the connection " . mysqli_error($con) . "'>connection problem</option>";
                                } else {
                                    $result = mysqli_query($con, "SELECT uni_name FROM Universities");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $uni_name = $row['uni_name'];
                                        echo "<option value=\"$uni_name\">$uni_name</option>";
                                    }
                                    mysqli_close($con);
                                }   
                            ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 0.1vw;">
                        <br> Πανεπιστήμιο - 3η επιλογή:&nbsp;
                        <select name="third-choice">
                            <option value="">-</option>
                            <?php
                                $con = mysqli_connect("localhost", "root", "", "erasmus_db.sql");
                                if (!$con) {
                                    echo "<option value='problem in the connection " . mysqli_error($con) . "'>connection problem</option>";
                                } else {
                                    $result = mysqli_query($con, "SELECT uni_name FROM Universities");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $uni_name = $row['uni_name'];
                                        echo "<option value=\"$uni_name\">$uni_name</option>";
                                    }
                                    mysqli_close($con);
                                }   
                            ?>
                        </select>
                    </div>
                    <p>Αναλυτική βαθμολογία:</p><input type="file" name="marks" id="marks"> <br>
                    <p>Πτυχίο αγγλικής γλώσσας:</p> <input type="file" name="english-lang-cert-paper" id="elcp"> <br>
                    <p>Πτυχία άλλων ξένων γλωσσών:</p> <input type="file" name="other-lang-cert" id="olcp" multiple style="margin-top: 0vw";> <br>
                    <p> Αποδοχή των όρων:
                    <input type="checkbox" name="accept-terms" id="terms"></p>
                    <p id="error_msg" style="color: red;font-size: small;" hidden></p>
                    <input type="submit" value="Υποβολή φόρμας" style="margin-top: 1vw;">
                </div>
            </form> 

            <div class="footer-image">
                <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
            </div>
        
        </div>
    </body>
    <script>
            function checkNec(){
                /*
                    Τα πεδία Όνομα, Επίθετο και Αριθμός Μητρώου θα είναι προ-συμπληρωμένα, δεν χρειάζονται έλεχγο
                    Επίσης η πρώτη επιλογή πανεπιστημίου δεν έχει κενό πεδίο, δεν χρειάζεται έλεχγο
                */
                var pass_perc = document.getElementById('passed_perc');
                var average = document.getElementById('average');
                var marks = document.getElementById("marks");
                var english_cert_paper = document.getElementById("elcp");
                var terms = document.getElementById("terms");
                var error = document.getElementById("error_msg");
                error.setAttribute('hidden', '');

                if(pass_perc.value==''){
                    error.innerHTML = "Το πεδίο 'Ποσοστό περασμένων μαθημάτων' είναι υποχρεωτικό.";
                    error.removeAttribute('hidden');
                    return false;
                }
                if(average.value==''){
                    error.innerHTML = "Το πεδίο 'Μέσος όρος περασμένων μαθημάτων' είναι υποχρεωτικό.";
                    error.removeAttribute('hidden');
                    return false;
                }
                if(marks.files.length == 0){
                    error.innerHTML = "Απαιτείται αρχείο αναλυτικής βαθμολογίας.";
                    error.removeAttribute('hidden');
                    return false;
                }
                if(english_cert_paper.files.length == 0){
                    error.innerHTML = "Απαιτείται αρχείο πιστοποιητικού αγγλικών.";
                    error.removeAttribute('hidden');
                    return false;
                }
                if(!terms.checked){
                    error.innerHTML = "Απαιτείται αποδοχή των όρων.";
                    error.removeAttribute('hidden');
                    return false;
                }
                return true;
            }
        </script>
</html