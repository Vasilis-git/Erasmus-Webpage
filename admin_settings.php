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
        table input[type="button"]{
            all:revert;
            display:block;
            width:100%;
            font-size: medium;
        }
        table input[type="text"]{
            all:revert;
            width: 100%;
            box-sizing: border-box;
            height: 100%;
            font-size: medium;
        }
        select{
            width: 100%;
            height: 100%;
            border-radius: 0;
            margin: 0;
        }
        input[type="date"]{
            width:50%;
        }

        form{
            all:revert;
            width: 100%;
            display: inline-block;
        }
        
        tr:nth-child(even) {
            border-bottom: 1px solid gray;
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
            margin: auto;
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
            margin-top: 0;
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
                        "ad ad ad ad u  u  u  u"
                        "ap ap ap ap ap ap ap ap"
                        "a  a  a  a  a  a  a  a"
                        "fi fi fi fi fi fi fi fi"
                        ;
                }
                .uni{
                    margin-left: auto;
                }
            }
            @media screen and (max-width: 759px) {/*for phones and tablets*/
                .container{
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    margin: 0 auto;
                    grid-template-areas: 
                                    "h h"
                                    "ht ht"
                                    "m m"
                                    "ad u"
                                    "ap ap"
                                    "a a";
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
                            echo '
                                <p>
                                    <label for="start_date">Από: </label>
                                    <input type="date" min="2023-06-06" id="start_date" name="start_date" onchange="setEndDate();" value="'.$res["start_d"].'">
                                    <br>
                                    <label for="end_date">Έως: </label>
                                    <input type="date" min="2023-06-13" max="2023-08-13" id="end_date" name="end_date" value="'.$res["end_d"].'">
                                </p>

                            ';

                        }else{
                            echo ' 
                            <p>
                                <label for="start_date">Από:</label>
                                <input type="date" min="2023-06-06" id="start_date" name="start_date" onchange="setEndDate();"">
                                <br>
                                <label for="end_date">Έως:</label>
                                <input type="date" min="2023-06-13" max="2023-08-13" id="end_date" name="end_date">
                            </p>
                            ';
                        }
                    ?>
                    
                    <input type ="submit" name="date_submit" value="Αποθήκευση">
                    <input type ="button" name="clear_date" value="Καθαρισμός" onclick="clearDates();">
                </form>
            </div>

            <div class = "applications content" >
                <h1>Αιτήσεις</h1>
                <form action="scripts/submit_approved.php" method="GET" id="allApplications">
                    <table id="ApplicationsTable">
                        <tr>
                            <th rowspan="2"></th>
                            <th rowspan="2">Όνομα</th>
                            <th rowspan="2">Επίθετο</th>
                            <th rowspan="2">ΑΜ</th>
                            <th rowspan="2">
                                % περασμένων
                                <input type="number" min="70" max="100" id="min_success" style="font-size:medium;" onchange="filterByMin();">
                            </th>
                            <th rowspan="2">
                                Μ.Ο.
                                <input type="button" id="dec" value="Φθίνουσα σειρά" onclick="sortTable();">
                            </th>
                            <th rowspan="2">Πιστοποιητικό αγγλικής γλώσσας</th>
                            <th rowspan="2">Eπιπλέων ξένες γλώσσες</th>
                            <th rowspan="1" colspan="3" style="border-bottom: 1px solid gray;">
                                Πανεπιστήμιο
                                <select id="specific_uni" style="font-size: small;" onchange="specificUni();">
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
                            <th rowspan="2">Πτυχίο αγγλικών</th>
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
                                        echo "<td> <input type=\"checkbox\" name=\"".$user_id["user_id"]."\"> </td>";//will be sent only if it's checked by default
                                        echo "<td>".$row["fname"]."</td>";   
                                        echo "<td>".$row["lname"]."</td>";
                                        echo "<td>".$row["a_m"]."</td>";         
                                        echo "<td pass_perc=\"".$row["pass_perc"]."\">".$row["pass_perc"]."</td>";
                                        echo "<td avr=\"".$row["avrg"]."\">".$row["avrg"]."</td>";
                                        echo "<td>".$row["eng_lan_certif"]."</td>";
                                        if($row["xtr_lang_cert"] == null){
                                            echo "<td> NO </td>";
                                        }else{
                                            echo "<td> YES </td>";
                                        }
                                        echo "<td f=\"".$row["f_choice"]."\">".$row["f_choice"]."</td>";
                                        if($row["s_choice"] == null){
                                            echo "<td s=\"NONE\"> NONE </td>";
                                        }else{
                                            echo "<td s=\"".$row["s_choice"]."\">".$row["s_choice"]."</td>";
                                        }
                                        if($row["t_choice"] == null){
                                            echo "<td t=\"NONE\"> NONE </td>";
                                        }else{
                                            echo "<td t=\"".$row["t_choice"]."\">".$row["t_choice"]."</td>";
                                        }
                                        echo '<td> <a href="uploads/'.$row["a_m"].'/'.$row["marks"].'" target="_blank"> View </a> </td>';
                                        echo '<td> <a href="uploads/'.$row["a_m"].'/'.$row["eng_lan_certif_file"].'" target="_blank"> View </a> </td>';
                                        
                                        if($row["xtr_lang_cert_file"] == null){
                                            echo "<td> NONE </td>";
                                        }else{
                                            $filenames = [];
                                            $token = strtok($row["xtr_lang_cert_file"], ',');
                                            while($token != false){
                                                $filenames[] = $token;
                                                $token = strtok(',');
                                            }
                                            echo ' <td> <select name="file-links" onchange="handleSelect(this);">';
                                            echo '<option value="count" disabled selected hidden> View '.count($filenames).'</option>';
                                            foreach($filenames as $index => $name){
                                                echo '<option value="uploads/'.$row["a_m"].'/'.$name.'"> file'.$index.' </option>';
                                            }
                                            echo '</select> </td>';
                                        }
                                    echo "</tr>";
                                }
                            }
                            mysqli_close($con);
                        ?>

                    </table>
                    <input type="button" value="Κατάργηση επιλογής" onclick="uncheckAll('allApplications');">
                    <input type="submit" value="Έγκριση επιλεγμένων">
                </form>

                <h1>Δεκτές Αιτήσεις</h1>
                <form action="scripts/announce_results.php" method="GET">
                    <table>
                        <tr>
                            <th rowspan="2">Όνομα</th>
                            <th rowspan="2">Επίθετο</th>
                            <th rowspan="2">ΑΜ</th>
                            <th rowspan="2">% περασμένων</th>
                            <th rowspan="2">Μ.Ο.</th>
                            <th rowspan="2">Πιστοποιητικό αγγλικής γλώσσας</th>
                            <th rowspan="2">Επιπλέων ξένες γλώσσες</th>
                            <th rowspan="1" colspan="3">Πανεπιστήμιο</th>
                            <th rowspan="2">Αναλυτική βαθμολογία</th>
                            <th rowspan="2">Πτυχίο αγγλικών</th>
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
                                            $filenames = [];
                                            $token = strtok($row["xtr_lang_cert_file"], ',');
                                            while($token != false){
                                                $filenames[] = $token;
                                                $token = strtok(',');
                                            }
                                            echo ' <td> <select name="file-links" onchange="handleSelect(this);">';
                                            echo '<option value="count" disabled selected hidden> View '.count($filenames).'</option>';
                                            foreach($filenames as $index => $name){
                                                echo '<option value="uploads/'.$row["a_m"].'/'.$name.'"> file'.$index.' </option>';
                                            }
                                            echo '</select> </td>';
                                        }
                                    echo "</tr>";
                                }
                            }
                            mysqli_close($con);
                        ?>

                    </table>
                    <?php
                        $today = new DateTime();
                        $today_date = $today->format('Y-m-d');
                        $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die('connection problem');
                        $result = mysqli_fetch_assoc(mysqli_query($con, "SELECT end_d FROM applications_date"));
                        $end_date = new DateTime($result["end_d"]);

                        if($today > $end_date){
                            echo '<input type="submit" value="Ανακοίνωση αποτλεσμάτων">';
                        }
                        else{
                            echo "<p><span style=\"display:inline-block;width:100%;background-color:red;color:white;font-size: medium; color: white; border-radius: 2px; margin-top: 10px; padding: 4px;\">Πρέπει να λήξει η περίοδος δηλώσεων για ανακοίνωση των αποτελεσμάτων.</span></p>";
                        }
                        mysqli_close($con);
                    ?>
                    
                </form>
            </div>

            <div class = "uni content">
                <h1>Συνεργαζόμενα πανεπιστήμια</h1>
                <!-- κουμπί "συνεργαζόμενα πανεπιστήμια", τα εμφανίζει παίρνωντας τα απ΄τη βάση δεδομένων
                    κουμπία προσθήκης και αφαίρεσης πανεπιστημίου
                -->
                <form method="GET" id="unis_form">
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "erasmus_db") or die('connection problem');
                        $result = mysqli_query($con, "SELECT uni_name, country FROM universities");
                        echo '<table>';
                        echo '<tr> <th></th> <th> Όνομα </th><th> Χώρα </th> </tr>';
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td style="width:1%;"> <input type="checkbox"> </td>';
                            echo '<td>'.$row['uni_name'].'</td><td>'.$row['country'].'</td>';
                            echo '</tr>';
                        }
                        echo '<tr> <td> <input type="button" value="+" onclick="enableInput();"> </td> <td> <input id="uni_name" name="uni_name" type="text" placeholder="Όνομα..." disabled> </td> <td> <input id="country" name="country" type="text" placeholder="Χώρα..." disabled> </td> </tr>';
                        echo '</table>';
                        echo '<input type="button" id="addButton" style="all:revert;width:100%;font-size:medium;display:block;" value="Προσθήκη" onclick="addUni();" disabled>';
                        mysqli_close($con);
                    ?>
                    <input type="button" value="Αφαίρεση επιλεγμένων">
                    <input type="button" value="Κατάργηση επιλογής" onclick="uncheckAll('unis_form');">
                </form>
            </div>

            <div class="admin content">
                <h1>Διαχειριστές</h1>
                <!-- κουμπί 'Διαχειριστές', θα προβάλει όλους τους διαχειριστές τις σελίδας και θα έχει κουμπί προσθήκη
                μετά φόρμα παρόμοια με το sign_up, αλλά με αριθμό μητρώου 2022999999999 και δημιουργία τυχαίου κωδικού 10 χαρακτήρων    
            -->
            </div>

        </div>
        <script>
            function addUni(){
                var form = document.getElementById('unis_form');
                var uni_name = document.getElementById('uni_name').value;
                var country = document.getElementById('country').value;
                if(uni_name == '' || country == ''){
                    alert('Δεν μπορείς να εισάγεις κενά δεδομένα.');
                }
                else if(uni_name.length > 20 || country.length > 20){
                    alert('Μέγιστο πλήθος χαρακτήρων: 20.');
                }
                else{
                    form.action = "scripts/addUni.php";
                    form.requestSubmit();
                }
            }
            function enableInput(){
                var uni_name = document.getElementById('uni_name');
                var country = document.getElementById('country');
                var addButton = document.getElementById('addButton');
                uni_name.disabled = false;
                country.disabled = false;
                addButton.disabled = false;
            }
            function handleSelect(option){
                window.open(option.value, '_blank').focus;
            }
            function specificUni(){
                var choice = document.getElementById("specific_uni").value;
                var table = document.getElementById("ApplicationsTable");
                var rows = table.rows;

                if(choice=="all"){
                    for(i=2; i < rows.length; i++){
                        rows[i].removeAttribute('hidden');
                    }
                }
                else{
                    for(i=2; i < rows.length; i++){
                        rows[i].removeAttribute('hidden');
                        if(rows[i].getElementsByTagName("TD")[8].getAttribute('f') != choice && rows[i].getElementsByTagName("TD")[9].getAttribute('s') != choice && rows[i].getElementsByTagName("TD")[10].getAttribute('t') != choice){
                            rows[i].setAttribute('hidden', '');
                        }
                    }
                }
            }
            function filterByMin(){
                var minSuccess = document.getElementById('min_success').value;
                var table = document.getElementById("ApplicationsTable");
                var rows = table.rows;
                var x;

                if(minSuccess == ''){//show every application
                    for(i=2; i < rows.length; i++){
                        rows[i].removeAttribute('hidden');
                    }
                }
                else{
                    for(i=2; i < rows.length; i++){
                        x = rows[i].getElementsByTagName("TD")[4];
                        if(x.getAttribute('pass_perc') < minSuccess){
                            rows[i].setAttribute('hidden', '');
                        }
                    }
                }
            }
            function sortTable(){
                var table, rows, switching, i, x, y, shouldSwitch;

                table = document.getElementById("ApplicationsTable");
                switching=true;
                while(switching){
                    switching=false;
                    rows = table.rows;
                    /* Loop through all table rows (except the 2
                    first, which contains table headers):*/
                    for (i = 2; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[5];
                        y = rows[i+1].getElementsByTagName("TD")[5];
                        if(x.getAttribute('avr') < y.getAttribute('avr')){
                            shouldSwitch = true;
                            break;
                        }
                    }
                    if(shouldSwitch){
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }
            function uncheckAll(formID){
                var checkboxes = document.querySelectorAll('form[id="'+formID+'"] input[type="checkbox"]');
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