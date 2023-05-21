<!DOCTYPE html>

<html style="background-color: rgb(173, 173, 173);">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styles/stylefile.css"/>
        <title> Erasmus UoP</title>
        <style>
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
                <h1>Ελάχιστες απαιτήσεις</h1>
            </div>

            <div class="menu">
                <a href="index.php">Αρχική</a>
                <a href="login.php">Σύνδεση χρήστη</a>
                <a href="more.html">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
            </div>

            <form id="ApplicationForm" method="POST" action="scripts/application_form.php" onsubmit="return checkNec();">
                <div class="form-credentials">
                    <input type="text" name="fname" placeholder="Όνομα" readonly> <br>
                    <input type="text" name="lname" placeholder="Επίθετο" readonly> <br>
                    <input type="number" name="AM" placeholder="AM" readonly> <br>
                    <br>
                    Ποσοστό περασμένων μαθημάτων έως και το προηγούμενο έτος:&nbsp;
                    <input type="number" name="passed_perc" id="passed_perc" min="0" max="100" value="50" style="margin-top: 0vw;"><br>
                    <br>
                    Μέσος όρος των περασμένων μαθημάτων έως και το προηγούμενο έτος:&nbsp;
                    <input type="number" name="average" id ="average" min="0" max="10" value="5" step="0.01" style="margin-top: 0vw;"><br><br>
                    Πιστοποιητικό γνώσης της αγγλικής γλώσσας:<br>
                    <input type="radio" name="english-lang-cert" id="none" value="Κανένα" checked>Κανένα
                    <input type="radio" name="english-lang-cert" id="A1" value="A1">A1
                    <input type="radio" name="english-lang-cert" id="A2" value="A2">A2
                    <input type="radio" name="english-lang-cert" id="B1" value="B1">B1
                    <input type="radio" name="english-lang-cert" id="B2" value="B2">B2
                    <input type="radio" name="english-lang-cert" id="C1" value="C1">C1
                    <input type="radio" name="english-lang-cert" id="C2" value="C2">C2 <br>
                    <br>Γνώση επιπλέον ξένων γλωσσών:<br>
                    <input type="radio" name="extra-lang-cert" id="yes" value="yes">ΝΑΙ
                    <input type="radio" name="extra-lang-cert" id="no" value="no" checked>ΟΧΙ
                    <br>
                    <div style="margin-bottom: 0.1vw;">
                        <br> Πανεπιστήμιο - 1η επιλογή:&nbsp;
                        <select name="first-choice">
                            <?php
                                $con = mysqli_connect("localhost", "root", "", "erasmus_db");
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
                                $con = mysqli_connect("localhost", "root", "", "erasmus_db");
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
                                $con = mysqli_connect("localhost", "root", "", "erasmus_db");
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
                    <br> <br>Αναλυτική βαθμολογία: <input type="file" name="marks" id="marks"><br>
                    <input type="submit" value="Υποβολή αρχείου" style="margin-top: 0vw";> 
                    <br>Πτυχίο αγγλικής γλώσσας: <input type="file" name="english-lang-cert-paper" id="elcp"><br>
                    <input type="submit" value="Υποβολή αρχείου" style="margin-top: 0vw";><br>
                    <br>Πτυχία άλλων ξένων γλωσσών: <input type="file" name="other-lang-cert" id="olcp" multiple style="margin-top: 0vw";>
                    <input type="submit" value="Υποβολή αρχείων"> 
                    <br> <br>
                    Αποδοχή των όρων:
                    <input type="checkbox" name="accept-terms" id="terms"><br>
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
                var english_lang_cert = document.getElementsByName("english-lang-cert");
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
                if(english_lang_cert[0].checked){
                    error.innerHTML = "Απαιτείται πιστοποιητικό αγγλικών τουλάχιστον Α1 για υποβολή της αίτησης.";
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
</html>