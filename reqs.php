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
            #ReqsForm{
                grid-area: rf;
            }
            @media screen and (min-width: 760px) {/*for desktop*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(8, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        margin: 0 auto;
                        grid-template-areas: 
                                            "h  h  h  h  h  h  h  hi"
                                            "ht ht ht ht ht ht ht hi"
                                            "m  m  m  m  m  m  m  m"
                                            "c  c  c  c  rf rf rf rf"
                                            "c  c  c  c  rf rf rf rf"
                                            "fi fi .  .  .  .  di di"
                                            ;
                }
                #brochure-button{
                    float:none;
                }
            }

            @media screen and (max-width: 759px) {/*for phones and tablets*/
                .container{
                        display: grid;
                        grid-template-columns: repeat(1, 1fr);
                        grid-auto-rows: minmax(1vw, auto);
                        margin: 0 auto;
                        grid-template-areas: 
                                            "h"
                                            "ht"
                                            "m"
                                            "c"
                                            "rf"
                                            ;
                                           
                }
                .decor-image{
                    display:none;
                }
                .footer-image{
                    display:none;
                }
                .heading-image{
                    display:none;
                }
                .heading{
                    border-top-right-radius: 1vw;
                }
                .heading-title{
                    border-bottom-right-radius: 1vw;
                }
                #brochure-button{
                    width: 100%;
                    text-align: center;
                    margin-bottom: 4px;
                    box-shadow: none;
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
                <h1>Ελάχιστες απαιτήσεις συμμετοχής</h1>
            </div>
            
            <div class="menu">
                <a href="index.php">Αρχική</a>
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<a href=\"login.php\">Σύνδεση χρήστη</a>";
                    }
                ?>
                <a href="more.php">Περισόττερα</a>
                <?php
                    if(isset($_SESSION['username']) && $_SESSION['user_type'] == 'admin'){
                        echo "<a href=\"admin_settings.php\">Ρυθμίσεις Διαχειριστή</a>";
                    } else{
                        echo "<a href=\"app.php\">Αίτηση</a>";
                    }
                ?>
            </div>
                <div class="content">
                    <p>Ενημερωτικό φυλλάδιο προγράμματος Erasmus 2023:
                    <a id="brochure-button" href="https://www.iky.gr/el/iky-rss/item/download/6919_43e80877fd9f6744d134b790f4e3f4b4">εδώ</a></p>
                    <table border="3" cellpadding="4" style="margin: 1vw 0vw 1vw 0vw;">
                        <tr><th>Ελάχιστες απαιτήσεις συμμετοχής</th></tr>
                        <tr><td>Τρέχον έτος σπουδών (απαίτηση: μεγαλύτερο ή ίσο του 2ου έτους)</td></tr>
                        <tr><td>Ποσοστό «περασμένων» μαθημάτων έως το προηγούμενο έτος σπουδών (απαίτηση: μεγαλύτερο ή ίσο του 70% του συνόλου των μαθημάτων)</td></tr>
                        <tr><td>Μέσος όρος των «περασμένων» μαθημάτων έως το προηγούμενο έτος σπουδών (απαίτηση: μεγαλύτερος ή ίσος του 6.50) </td></tr>
                        <tr><td>Πιστοποιητικό γνώσης της αγγλικής γλώσσας (απαίτηση: κατ’ ελάχιστον «καλή γνώση της αγγλικής γλώσσας», που αντιστοιχεί σε επίπεδο B2 ή ανώτερο)</td></tr>
                    </table>
                </div>

                <div class="decor-image">
                    <img src="media/images/EU-logo.png" alt="European Union Logo" width="294" height="82" style="border-radius: 10px;">
                </div>
            <form id="ReqsForm" class="content">
                    <div>
                        <h2>Φόρμα αυτόματου ελέγχου πληρότητας των ελάχιστων απαιτήσεων</h2> 
                    </div>
                    <p id = "success_msg" style="color:green; font-size:small;" hidden>Πληρείς τις προυποθέσεις!</p>
                    <p id = "fail_msg" style="color:red; font-size:small;" hidden>Δεν πληρείς τις προυποθέσεις.</p>
                    Έτος σπουδών:&nbsp;
                    <select id="year" onchange="">
                        <option selected value="1o">1o</option>
                        <option value="2o">2o</option>
                        <option value="3o">3o</option>
                        <option value="4o">4o</option>
                        <option value="older">μεγαλύτερο</option>
                    </select> <br>
                    Ποσοστό περασμένων μαθημάτων έως και το προηγούμενο έτος:&nbsp;
                    <input type="number" id="passed_perc" min="0" max="100" value="50" style="margin-bottom: 1vw;">%<br>
                    Μέσος όρος των περασμένων μαθημάτων έως και το προηγούμενο έτος:&nbsp;
                    <input type="number" id="average" min="0" max="10" value="5" step="0.01" style="margin-bottom: 1vw;"><br>
                    Πιστοποιητικό γνώσης της αγγλικής γλώσσας:<br>
                    <input type="radio" name="english-lang-cert" id="none" value="Κανένα" checked>Κανένα
                    <input type="radio" name="english-lang-cert" value="A1">A1
                    <input type="radio" name="english-lang-cert" value="A2">A2
                    <input type="radio" name="english-lang-cert" value="B1">B1
                    <input type="radio" name="english-lang-cert" value="B2">B2
                    <input type="radio" name="english-lang-cert" value="C1">C1
                    <input type="radio" name="english-lang-cert" value="C2">C2 <br>
                    <input type="button" name="r-submit" value="Έλεγχος" onclick="checkForm();">
                    <input type="button" name="clear-form" value="Καθαρισμός φόρμας" onclick="clearForm();">
            </form>         
            <div class="footer-image">
                <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
            </div>
    </div>
    </body>
    <script>
        function clearForm(){
            var form = document.getElementById('ReqsForm');

            // Reset the form by setting each input element's value to an empty string
            var inputs = form.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                if(inputs[i].type != "button" && inputs[i].type != "submit"){
                    inputs[i].value = '';
                }
            }
            

            var errormessages = form.getElementsByTagName('p');
            for(var i=0; i < errormessages.length; i++){
                errormessages[i].setAttribute('hidden', '');
            }
        }
        function checkForm(){
            var passed_perc = document.getElementById('passed_perc');
            var avg = document.getElementById("average");
            var english_lang_cert = document.getElementsByName("english-lang-cert");
            var year = document.getElementById('year');
            var success = document.getElementById('success_msg');
            var fail = document.getElementById('fail_msg');
            success.setAttribute('hidden', '');
            fail.setAttribute('hidden', '');

            if(year.value != "1ο" && avg.value >= 6.5 && passed_perc.value >= 70 && (english_lang_cert[4].checked || english_lang_cert[5].checked || english_lang_cert[6].checked)){
                success.removeAttribute('hidden');
            }
            else{
                fail.removeAttribute('hidden');
            }
        }
    </script>
</html>