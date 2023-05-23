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
            @media screen and (max-width: 759px) {/*for phones and tablets*/
                .container{
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    margin: 0 auto;
                    grid-template-areas: 
                                    "h"
                                    "ht"
                                    "m"
                                    "f"
                                    "f"
                                    "f";
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
                    <h1>Σύνδεση χρήστη</h1>
                </div>

                <div class="menu">
                    <a href="index.php">Αρχική</a>
                    <a href="more.html">Περισόττερα</a>
                    <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                    <a href="app.php">Αίτηση</a>
                </div>
 
                <?php
                    if(isset($_SESSION['username'])){
                        header("location: usr_prof.php");
                    }
                ?>
 
                <form id="LoginForm" method="POST" action="scripts/login_check.php" onsubmit="return quickCheck();">
                    <br>
                    <div class="form-credentials">
                        <p id="error" style="color:red; font-size:small;" hidden>Το username δεν μπορεί να είναι κενό!</p>
                        <input type="text" id="username" name ="username" maxlength="10" placeholder="Όνομα χρήστη"><br>
                        <p id="errpsw" style="color: red;font-size: small;" hidden>Ο κωδικός πρέπει να αποτελέιται απο τουλάχιστον 5 χαρακτήρες και να περιέχει ένα χαρακτήρα σύμβολο (!,@,#,$,%,^,&).</p>
                        <input type="password" name ="password" id="pw" maxlength="15" placeholder="Κωδικός πρόσβασης" onchange="checkPwd();"><br>
                    </div>
                    <div class="form-buttons" style="text-align: center;">
                        <input type="submit" name="submit" value="Υποβολή">
                        <input type="button" name="clear-form" value="Καθαρισμός φόρμας" onclick="clearForm();">
                        <a href="sign-up.php" style="text-decoration: none;font-size: small;">Νέος χρήστης;</a>
                    </div>
                </form>

            
            <div class="footer-image">
                <img src="media/images/erasmus.png" alt="Erasmus picture" width="186" height="57">
            </div>
        </div>
    </body>
    <script>
        function clearForm(){
            var form = document.getElementById('LoginForm');

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
        function quickCheck(){//if username or password are empty, don't send
            var usr = document.getElementById('username');
            var er = document.getElementById('error');
            er.setAttribute('hidden', '');

            if(usr.value == ''){
                er.removeAttribute('hidden');
                return false;
            }
            
            return checkPwd();
        }
    </script>
</html>