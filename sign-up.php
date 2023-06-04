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
                <h1>Εγγραφή χρήστη</h1>
            </div>

            <div class="menu">
                <a href="index.html">Αρχική</a>
                <a href="login.php">Σύνδεση χρήστη</a>
                <a href="more.php">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                <a href="app.php">Αίτηση</a>
            </div>


            <form id="SignUpForm" method="POST" action="scripts/signup_form.php" onsubmit="return checkAll();">
                <div class="form-credentials" style="margin:auto;"> 
                    <p id="errfn" style="color: red;font-size: small;" hidden>Το όνομα δεν μπορεί να περιέχει αριθμούς.</p>
                    <input type="text" name="fname" id="fname" placeholder="Όνομα" onchange="checkName('fname', 'errfn');"> <br>

                    <p id="errln" style="color: red;font-size: small;" hidden>Το επώνυμο δεν μπορεί να περιέχει αριθμούς.</p>
                    <input type="text" name="lname" id="lname" placeholder="Επίθετο" onchange="checkName('lname', 'errln');"> <br>

                    <p id="errAM" style="color: red;font-size: small;" hidden>Μη έγκυρος Αριθμός Μητρώου.</p>
                    <input type="number" name="AM" id="AM" placeholder="AM" onchange="checkAM();"> <br>

                    <p id="errTel" style="color: red;font-size: small;" hidden>Μη έγκυρο τηλέφωνο.</p>
                    <input type="tel" name="phone-number" id="pn" placeholder="Τηλέφωνο" onchange="checkTel();"> <br>

                    <p id="errMail" style="color: red;font-size: small;" hidden>Μη έγκυρο e-mail.</p>
                    <input type="email" name="mail" id="mail" placeholder="email" onchange="checkEmail();"> <br>

                    <p id="errusrn" style="color: red;font-size: small;" hidden>Το username υπάρχει ήδη.</p>
                    <input type="text" name="username" id="username" placeholder="Διάλεξε ένα όνομα χρήστη..."> <br>

                    <p id="errpsw" style="color: red;font-size: small;" hidden>Ο κωδικός πρέπει να αποτελέιται απο τουλάχιστον 5 χαρακτήρες και να περιέχει ένα χαρακτήρα σύμβολο (!,@,#,$,%,^,&).</p>
                    <input type="password" name ="password" id="pw" placeholder="Κωδικός πρόσβασης" onchange="checkPwd();"><br>
                    <p id="errpsw-cf" style="color: red;font-size: small;" hidden>Οι κωδικοί δεν ταιριάζουν.</p>
                    <input type="password" name ="s-password-confirm" id="pwd-cf" placeholder="Επιβεβαίωση κωδικού" onchange="confirmPwd();"><br>
                    <p id="cs" style="color: blue;font-size: small;" hidden>Επιτυχής εγγραφή!</p>
                    <input type="submit" name="submit" value="Υποβολή">
                    <input type="button" name="clear-form" value="Καθαρισμός φόρμας" onclick="clearForm();">
                </div>
            </form>

            <div class="footer-image">
                <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
            </div>
        </div>
    </body>
    <script>
        function clearForm(){
            var form = document.getElementById('SignUpForm');

            // Reset the form by setting each input element's value to an empty string
            var inputs = form.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                if(inputs[i].type != "button" && inputs[i].type != "submit"){
                    inputs[i].value = '';
                }
            }

            // Clear textarea elements
            var textareas = form.getElementsByTagName('textarea');
            for (var i = 0; i < textareas.length; i++) {
                textareas[i].value = '';
            }

            var errormessages = form.getElementsByTagName('p');
            for(var i=0; i < errormessages.length; i++){
                errormessages[i].setAttribute('hidden', '');
            }
        }
        function checkName(nameField, errorField){
            var element = document.getElementById(nameField);
            var error = document.getElementById(errorField);
            error.setAttribute('hidden', '');

            for(i=0;i<10;i++){
                if(element.value.indexOf(i.toString()) != -1){
                    error.removeAttribute('hidden');
                    error.innerHTML ='Το παρακάτω πεδίο δεν μπορεί να περιέχει αριθμούς.';
                    return false;
                }
            }
            
            if(element.value != ''){
                return true;
            }
            else{
                error.removeAttribute('hidden');
                error.innerHTML = 'Το παρακάτω πεδίο δεν μπορεί να είναι κενό.';
                return false;
            }
        }
        function checkAM(){
            var input = document.getElementById('AM');
            var errmsg = document.getElementById('errAM');
            errmsg.setAttribute('hidden', '');

            if(input.value.toString().length != 13){
                errmsg.removeAttribute('hidden');
                return false;
            }
            var year = input.value.toString().substring(0, 4);
            if(year != '2022' && year != '2024' && year != '2025'){
               errmsg.removeAttribute('hidden');
               return false;
            }
            return true;
        }
        function checkTel(){
            var tel = document.getElementById('pn');
            var error = document.getElementById('errTel');
            error.setAttribute('hidden', '');

            for(i = 0; i < tel.value.length; i++){
                if(tel.value.charAt(i)< '0' || tel.value.charAt(i) > '9'){
                    error.removeAttribute('hidden');
                    error.innerHTML = 'Το τηλέφωνο πρέπει να περιέχει μόνο ψηφία';
                    return false;
                }
            }
            if(tel.value != '' && tel.value.length != 10){
                error.removeAttribute('hidden');
                error.innerHTML = 'Το τηλέφωνο πρέπει να έχει 10 ψηφία';
                return false;
            }
            if(tel.value ==''){
                error.removeAttribute('hidden');
                error.innerHTML = 'Το τηλέφωνο δεν μπορεί να είναι κενό';
                return false;
            }
            return true;
        }
        function checkEmail(){
            var email = document.getElementById('mail');
            var err = document.getElementById('errMail');
            err.setAttribute('hidden', '');
            var pattern = /^[a-zA-Z]+[0-9a-zA-Z]*@[a-zA-Z]+(\.[a-zA-Z]+){1,2}$/; //^: start of string and $: end of string

            if(pattern.test(email.value)){
                return true;
            }
            else{
                err.removeAttribute('hidden');
                return false;
            }
        }
        function checkPwd(){
            var pwd = document.getElementById('pw');
            var error = document.getElementById('errpsw');
            error.setAttribute('hidden', '');

            if(pwd.value =='' || pwd.value.length < 5){
                error.removeAttribute('hidden');
                return false;
            }
            // (!,@,#,$,%,^,&)
            var str = pwd.value;
            if (
                str.indexOf("!") !== -1 ||
                str.indexOf("@") !== -1 ||
                str.indexOf("#") !== -1 ||
                str.indexOf("$") !== -1 ||
                str.indexOf("%") !== -1 ||
                str.indexOf("^") !== -1 ||
                str.indexOf("&") !== -1
            ) {   
                error.setAttribute('hidden', '');
                return true;
            }
            else{
                error.removeAttribute('hidden');
                return false;
            }
        }
        function confirmPwd(){
            var pw = document.getElementById('pw');
            var pwd_cf = document.getElementById('pwd-cf');
            var error = document.getElementById('errpsw-cf');
            error.setAttribute('hidden', '');

            if(pwd_cf.value==''){
                error.removeAttribute('hidden');
                return false;
            }
            if(pw.value === pwd_cf.value){
                return true;
            }
            else{
                error.removeAttribute('hidden');
                return false;
            }
        }
        function checkAll(){
            var username = document.getElementById('username');
            var error = document.getElementById('errusrn');
            error.setAttribute('hidden', '');

            if(username.value ==''){
                error.removeAttribute('hidden');
                error.innerHTML = 'Το username δεν μπορεί να είναι κενό.';
                return false;
            }

            return (checkName('fname', 'errfn') && checkName('lname', 'errln') && checkAM() && checkTel() && checkEmail() && checkPwd() && confirmPwd());
        }
   </script>
</html>