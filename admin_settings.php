<!DOCTYPE html>

<?php 
    session_start();
?>

<html style="background-color: rgb(173, 173, 173);">
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="styles/stylefile.css"/>
        <title> Erasmus UoP</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <style>
        table{
            width:100%;
            border: 1px solid gray;
            border-collapse: collapse;
            float: left;
            align-items: center;
            justify-content: center;
        }
        form{
            all:revert;
            width: 100%;
            display: inline-block;
        }
        
        tr:nth-child(even) {
            border-bottom: 1px solid gray;
        }
        th:hover {
            background-color: #777777;
        }
        td:hover {
            background-color: #777777;
        }
        th, td {
            padding: 1px;
            text-align: center;
            border: 1px solid gray;
            vertical-align: middle;
        }
        input[type="checkbox"] {
            margin: 0 auto;
            display: block;
        }
        th input[type="button"], td a{
            all: revert;
        }
        td a:hover{
            all:revert;
            color:aliceblue;
        }
        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            border-radius: 1px;
        }
        .uni{
            grid-area: u;
        }
        .applications{
            grid-area: ap;
        }
        .application_date{
            grid-area: ad;
        }
        .admin{
            grid-area: a;
        }
        p{
            background-color: rgb(196, 196, 196);
            border-radius: 1vw;
            grid-area: p;
            font-size: large;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
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
                        ".  . ad ad ad ad  .  ."
                        "ap ap ap ap ap ap ap ap"
                        "u  u  u  u  u  u  u  u"
                        "a  a  a  a  a  a  a  a"
                        "fi fi fi fi fi fi fi fi"
                        ;
                }
            }
            @media screen and (max-width: 759px) {/*for phones and tablets*/
                .container{
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    margin: 0 auto;
                    grid-template-areas: 
                                    "h"
                                    "ht"
                                    "m"
                                    "ad"
                                    "ap"
                                    "u"
                                    "a";
                }
                .heading{
                    border-top-right-radius: 1vw;
                }
                .heading-title{
                    border-bottom-right-radius: 1vw;
                }
                .footer-image{
                    display: none;
                }
                .heading-image{
                    display: none;
                }
                .menu{
                    margin-bottom: 2vw;
                }
                form{
                    margin:auto;
                }
            }  
    </style>
    <body> 
        <div class="container">
            <div class="heading">
                <h1>Πρόγραμμα Erasmus Πανεπιστήμιο Πελλοπονήσου</h1>
            </div>       
            <div class="heading-image">
                <img src="media/images/uoplogo.png" alt="University of the Pelloponese Logo">
            </div>   
            <div class="heading-title">
                <h1>Ρυθμίσεις Διαχειριστή</h1>
            </div>

            <div class="menu">
                <a href="index.php">Αρχική</a>
                <a href="more.php">Περισόττερα</a>
                <!--διαφορετικές σελίδες για τις επιλογές με πρόσβαση απο το μενού εδώ;-->
            </div>

            <div class = "application_date content">
                <h1>Περίοδος αιτήσεων:</h1>
                <form id="dateForm" method="GET" action="scripts/application_date_set.php" style="border:none; padding-top:0vw;">   
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die("connection problem");

                        $sqli_res = mysqli_query($con, "SELECT start_d, end_d FROM applications_date");
                        $res = mysqli_fetch_assoc($sqli_res);

                        if($res["start_d"] != null && $res["end_d"] != null){
                            echo '<p>
                                    Από:
                                    <input type="date" min="2023-06-06" id="start_date" name="start_date" onchange="setEndDate();" value="'.$res["start_d"].'">
                                    Έως:
                                    <input type="date" min="2023-06-13" max="2023-08-13" id="end_date" name="end_date" value="'.$res["end_d"].'"><br>
                                </p>
                            ';

                        }else{
                            echo '<p>
                                    Από:
                                    <input type="date" min="2023-06-06" id="start_date" name="start_date" onchange="setEndDate();">
                                    Έως:
                                    <input type="date" min="2023-06-13" max="2023-08-13" id="end_date" name="end_date" ><br>
                                </p>
                            ';
                        }
                    ?>
                    
                    <input type ="submit" name="date_submit" value="Αποθήκευση">
                    <input type ="button" name="clear_date" value="Καθαρισμός" onclick="clearDates();">
                </form>
            </div>

            <div class = "applications content">
                <h1>Αιτήσεις</h1>
                <!-- Εδώ οι αιτήσεις με όλα τα στοιχεία που ζητά η εκφώνηση σε μορφή πίνακα της html,
                    Η πρώτη γραμμή να είναι οι επιλογές για εμφάνιση των αιτήσεων με φθίνουσα σειρά μέσου όρου (ένα κουμπί πάνω απο τη στήλη 'μέσος όρος')
                    Πάνω απο τη στήλη ποσοστό περασμένων μαθημάτων, πεδίο κειμένο που δέχεται νούμερα απο 0-100, θα εμφανίζει μόνο τις αιτήσεις με το
                    συγκεκριμένο νούμερο
                    drop down list επιλογής πανεπιστημίου, που θα παίρνει τα πανεπιστήμια απο τη βάση δεδομένων, όπως στη φόρμα στο usr_application.php
                    όταν επιλεγέι θα εμφανίζονται μόνο οι αιτήσεις που το περιλαμβάνουν
                    η 1η στήλη του πίνακα: ένα checkbox σε κάθε γραμμή, για επιλογή αιτήσεων.
                    κάτω κάτω κουμπί "δεκτές", για να θέτει τις επιλεγμένες αιτήσεις δεκτές
                -->
                <form action="scripts/submit_approved.php" method="GET">
                    <table>
                        <tr>
                            <th rowspan="2"></th>
                            <th rowspan="2">Όνομα</th>
                            <th rowspan="2">Επίθετο</th>
                            <th rowspan="2">ΑΜ</th>
                            <th rowspan="2">
                                % περασμένων
                                <input type="text" id="min_success" style="font-size:small;" placeholder="Ελάχιστο ποσοστό επιτυχίας...">
                            </th>
                            <th rowspan="2">
                                Μ.Ο.
                                <input type="button" id="dec" value="Φθίνουσα σειρά">
                            </th>
                            <th rowspan="2">Πιστοποιητικό αγγλικής γλώσσας</th>
                            <th rowspan="2">επιπλέων ξένες γλώσσες</th>
                            <th rowspan="1" colspan="3" style="border-bottom: 1px solid gray;">
                                Πανεπιστήμιο
                                <select id="specific_uni" style="font-size: small;">
                                <option value="all">Όλα τα συνεργαζόμενα</option>
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
                            </th>
                            <th rowspan="2">Αναλυτική βαθμολογία</th>
                            <th rowspan="2">Πτυχίο αγγλικώνς</th>
                            <th rowspan="2">Πτυχία άλλων ξένων γλωσσών</th>
                        </tr>
                        <tr>
                            <th>1η επιλογή</th>
                            <th>2η επιλογή</th>
                            <th>3η επιλογή</th>
                        </tr>

                        <?php 
                            $con = mysqli_connect("localhost", "root", "", "erasmus_db");
                            if (!$con) {
                                echo "Problem in the connection";
                            }
                            else{
                                $result = mysqli_query($con, "SELECT * FROM usr_aplications");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if($row["approved"] == true){
                                        continue;
                                    }
                                    $user_id = mysqli_fetch_assoc(mysqli_query($con, "SELECT user_id FROM users WHERE a_m=".$row["a_m"]));
                                    echo "<tr>";
                                        echo "<td> <input type=\"checkbox\" name=\"".$user_id["user_id"]."\"> </td>";
                                        echo "<td>".$row["fname"]."</td>";   
                                        echo "<td>".$row["lname"]."</td>";
                                        echo "<td>".$row["a_m"]."</td>";         
                                        echo "<td>".$row["pass_perc"]."</td>";
                                        echo "<td>".$row["avrg"]."</td>";
                                        echo "<td>".$row["eng_lan_certif"]."</td>";
                                        if($row["xtr_lang_cert"] == null){
                                            echo "<td> NO </td>";
                                        }else{
                                            echo "<td> YES </td>";
                                        }
                                        echo "<td>".$row["f_choice"]."</td>";
                                        if($row["s_choice"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            echo "<td>".$row["s_choice"]."</td>";
                                        }
                                        if($row["t_choice"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            echo "<td>".$row["t_choice"]."</td>";
                                        }
                                        echo '<td> <a href="uploads/'.$row["marks"].'" target="_blank"> View </a> </td>';
                                        echo '<td> <a href="uploads/'.$row["eng_lan_certif_file"].'" target="_blank"> View </a> </td>';
                                        if($row["xtr_lang_cert_file"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            echo '<td> <a href="uploads/'.$row["xtr_lang_cert_file"].'" target="_blank"> View </a> </td>';
                                        }
                                    echo "</tr>";
                                }
                            }
                            mysqli_close($con);
                        ?>

                    </table>
                    <input type="button" value="Κατάργηση επιλογής" onclick="uncheckAll();">
                    <input type="submit" value="Έγκριση επιλεγμένων">
                </form>

                <h1>Δεκτές Αιτήσεις</h1>
                <!-- Κουμπί "εμφάνιση δεκτών αιτήσεων", να τις τυπώνει όπως πάνω αλλά χωρίς δυνατότητα επεξεργασίας
                    κάτω κάτω κουμπί 'ανακοίνωση των αποτελεσμάτων', θα μεταφέρει τις δεκτές στο more.php
                -->
                <form action="announce_results.php" method="GET">
                    <table>
                        <tr>
                            <th rowspan="2">Όνομα</th>
                            <th rowspan="2">Επίθετο</th>
                            <th rowspan="2">ΑΜ</th>
                            <th rowspan="2">
                                % περασμένων
                                <input type="text" id="min_success" style="font-size:small;" placeholder="Ελάχιστο ποσοστό επιτυχίας...">
                            </th>
                            <th rowspan="2">
                                Μ.Ο.
                                <input type="button" id="dec" value="Φθίνουσα σειρά">
                            </th>
                            <th rowspan="2">Πιστοποιητικό αγγλικής γλώσσας</th>
                            <th rowspan="2">επιπλέων ξένες γλώσσες</th>
                            <th rowspan="1" colspan="3" style="border-bottom: 1px solid gray;">
                                Πανεπιστήμιο
                                <select id="specific_uni" style="font-size: small;">
                                <option value="all">Όλα τα συνεργαζόμενα</option>
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
                            </th>
                            <th rowspan="2">Αναλυτική βαθμολογία</th>
                            <th rowspan="2">Πτυχίο αγγλικώνς</th>
                            <th rowspan="2">Πτυχία άλλων ξένων γλωσσών</th>
                        </tr>
                        <tr>
                            <th>1η επιλογή</th>
                            <th>2η επιλογή</th>
                            <th>3η επιλογή</th>
                        </tr>

                        <?php 
                            $con = mysqli_connect("localhost", "root", "", "erasmus_db");
                            if (!$con) {
                                echo "Problem in the connection";
                            }
                            else{
                                $result = mysqli_query($con, "SELECT * FROM usr_aplications");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if($row["approved"] != true){
                                        continue;
                                    }
                                    echo "<tr>";
                                        echo "<td>".$row["fname"]."</td>";   
                                        echo "<td>".$row["lname"]."</td>";
                                        echo "<td>".$row["a_m"]."</td>";         
                                        echo "<td>".$row["pass_perc"]."</td>";
                                        echo "<td>".$row["avrg"]."</td>";
                                        echo "<td>".$row["eng_lan_certif"]."</td>";
                                        if($row["xtr_lang_cert"] == null){
                                            echo "<td> NO </td>";
                                        }else{
                                            echo "<td> YES </td>";
                                        }
                                        echo "<td>".$row["f_choice"]."</td>";
                                        if($row["s_choice"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            echo "<td>".$row["s_choice"]."</td>";
                                        }
                                        if($row["t_choice"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            echo "<td>".$row["t_choice"]."</td>";
                                        }
                                        echo '<td> <a href="uploads/'.$row["marks"].'" target="_blank"> View </a> </td>';
                                        echo '<td> <a href="uploads/'.$row["eng_lan_certif_file"].'" target="_blank"> View </a> </td>';
                                        if($row["xtr_lang_cert_file"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            echo '<td> <a href="uploads/'.$row["xtr_lang_cert_file"].'" target="_blank"> View </a> </td>';
                                        }
                                    echo "</tr>";
                                }
                            }
                            mysqli_close($con);
                        ?>

                    </table>
                    <input type="submit" value="Ανακοίνωση αποτλεσμάτων">
                </form>
            </div>

            <div class = "uni content">
                <h1>Συνεργαζόμενα πανεπιστήμια</h1>
                <!-- κουμπί "συνεργαζόμενα πανεπιστήμια", τα εμφανίζει παίρνωντας τα απ΄τη βάση δεδομένων
                    κουμπία προσθήκης και αφαίρεσης πανεπιστημίου
                -->
            </div>

            <div class="admin content">
                <h1>Διαχειριστές</h1>
                <!-- κουμπί 'Διαχειριστές', θα προβάλει όλους τους διαχειριστές τις σελίδας και θα έχει κουμπί προσθήκη
                μετά φόρμα παρόμοια με το sign_up, αλλά με αριθμό μητρώου 2022999999999 και δημιουργία τυχαίου κωδικού 10 χαρακτήρων    
            -->
            </div>

        </div>
        <script>
            function uncheckAll(){
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for(var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = false;
                }
            }
            function setEndDate(){
                //set end date min to one week later
                var end_date = document.getElementById('end_date');
                var today_date = new Date(document.getElementById('start_date').value);
                var date = today_date.getDate();
                var month = today_date.getMonth() + 1;
                var year = today_date.getFullYear();

                date += 7;
                if(date > 28){
                    if(month == 2){
                        if(year % 400 == 0 || (year % 4 == 0 && year % 100 != 0)){//leap
                            if(date > 29){
                                month += 1;
                                date = date - 29;
                            }
                        }
                        else{
                            month += 1;
                            date = date - 28;
                        }
                    }
                    else if((month % 2 == 1 && month < 8) || (month % 2 == 0 && month >= 8)){//months with 31 days
                        if(date > 31){
                            month += 1;
                            date = date - 31;
                            if(month == 13){
                                month = 1;
                                year += 1;
                            }
                        }
                    }
                    else{
                        if(date > 30){
                            month += 1;
                            date = date - 30;
                        }
                    }
                }
                var end_d = new Date(year + '-' + month + '-' + date);
                res = addZeros(end_d);
                d = year + '-' + res.month + '-' + res.date;
                end_date.setAttribute('min', d);
                //set max date 2 months later
                var min_date = today_date.getAttribute('min').Date();

                month += 2;
                if(month > 12){
                    month -= 12;
                    year +=1;
                }
                res = addZeros(d);
                d = year + '-' + res.month + '-' + res.date;
                end_date.setAttribute('max', d);
            }
            //set today's date as min
            var d = new Date();

            res = addZeros(d);        
            d = d.getFullYear() + '-' + res.month + '-' + date;
            var today_date = document.getElementById('start_date');
            today_date.setAttribute('min', d);
           

            function addZeros(d){
                var dd = d.getDate();
                var mm = d.getMonth() + 1;
                var yyyy = d.getFullYear();

                if(dd < 10){
                    dd = '0'+dd;
                }
                if(mm < 10){
                    mm = '0'+mm;
                }
                return {date: dd, month: mm};
            }
            function clearDates(){
                document.getElementById('start_date').value = "";
                document.getElementById('end_date').value = "";
            }
        </script>
    </body>
</html>