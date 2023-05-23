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
    <body> 
        <div class="container">
            <div class="heading">
                <h1>Πρόγραμμα Erasmus Πανεπιστήμιο Πελλοπονήσου</h1>
            </div>       
            <div class="heading-image">
                <img src="media/images/uoplogo.png" alt="University of the Pelloponese Logo">
            </div>   
            <div class="heading-title">
                <h1>Προφίλ Χρήστη</h1>
            </div>

            <div class="menu">
                <a href="index.php">Αρχική</a>
                <a href="more.html">Περισόττερα</a>
                <a href="reqs.php">Ελάχιστες απαιτήσεις</a>
                <a href="app.php">Αίτηση</a>
            </div>
           
                <br>
                <form id="ProfileForm" method="POST" onsubmit="return checkAll();">
                    <div class="form-credentials">
                        
                        <p>Username: </p>
                        <input type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" readonly> <br>
                        
                        <p>Κωδικός πρόσβασης:</p>
                        <p id="errpsw" style="color: red;font-size: small;" hidden>Ο κωδικός πρέπει να αποτελέιται απο τουλάχιστον 5 χαρακτήρες και να περιέχει ένα χαρακτήρα σύμβολο (!,@,#,$,%,^,&).</p>
                        <input type="password" name ="password" id="pw" maxlength="15" onchange="checkPwd();" value="<?php echo $_SESSION['password']; ?>" ><br>
                        
                        <p id="errfn" style="color: red;font-size: small;" hidden>Το όνομα δεν μπορεί να περιέχει αριθμούς.</p>
                        <p>Όνομα: </p>
                        <input type="text" name="fname" id = "fname" value="<?php echo $_SESSION['fname']; ?>" onchange="checkName('fname', 'errfn');"> <br>
                        <p id="errln" style="color: red;font-size: small;" hidden>Το επώνυμο δεν μπορεί να περιέχει αριθμούς.</p>
                        <p>Επίθετο: </p>
                        <input type="text" name="lname" id = "lname" value="<?php echo $_SESSION['lname']; ?>" onchange="checkName('lname', 'errln');"> <br>
                        <p id="errAM" style="color: red;font-size: small;" hidden>Μη έγκυρος Αριθμός Μητρώου.</p>
                        <p>ΑΜ: </p>
                        <input type="number" name="AM" id = "AM" value="<?php echo $_SESSION['a_m']; ?>" onchange="checkAM();"> <br>
                        
                        <p id="errTel" style="color: red;font-size: small;" hidden>Μη έγκυρο τηλέφωνο.</p>
                        <p>Τηλέφωνο: </p>
                        <input type="tel" name="phone-number" id="pn" onchange="checkTel();" value="<?php echo $_SESSION['tel']; ?>" ><br>
                        <p id="errMail" style="color: red;font-size: small;" hidden>Μη έγκυρο e-mail.</p>
                        <p>email: </p>
                        <input type="email" name="mail" id="mail"  onchange="checkEmail();" value="<?php echo $_SESSION['email']; ?>"> <br>
                    </div>
                    <div class="form-buttons" style="text-align: center;">
                        <input type="submit" name="sign-out" value="Αποσύνδεση" onclick="setAction('scripts/sign_out.php');">
                        <input type="submit" name="save_new" value="Αποθήκευση" onclick="setAction('scripts/save_new.php');">
                    <div>
                </form>
        </div>
    </body>
    <script>
        function setAction(action){
            document.getElementById('ProfileForm').action = action;
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
        function checkAll(){
            var username = document.getElementById('username');
            var error = document.getElementById('errusrn');
            error.setAttribute('hidden', '');

            if(username.value ==''){
                error.removeAttribute('hidden');
                error.innerHTML = 'Το username δεν μπορεί να είναι κενό.';
                return false;
            }

            return (checkName('fname', 'errfn') && checkName('lname', 'errln') && checkAM() && checkTel() && checkEmail() && checkPwd());
        }
    </script>
</html>